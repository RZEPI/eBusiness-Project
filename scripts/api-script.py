import json
import sys
import io
from random import randint
from prestapyt import PrestaShopWebServiceDict

DATA_PATH = "../scrapped-data"
CATEGORIES_FILE = "/categories.json"
IMAGES_DIR = "/images"
SUBCATEGORIES_FILE = "/subcategories.json"
PRODUCTS_FILE = "/products.json"

API_KEY = "2ACW94YGW4W8H53JCZYGUQG1Y4VYJWM8"
IS_SECURE = False
URI = "http://localhost:8080"
URI_SECURE = "https://localhost"
HOME_CAT_ID = 2


def load_json_data(file_name=CATEGORIES_FILE):
    with open(f"{DATA_PATH}{file_name}", 'r') as file:
        json_data = json.loads(file.read())
    return json_data


def make_url(api_path=""):
    if IS_SECURE:
        return f"{URI_SECURE}/api/{api_path}"
    else:
        return f"{URI}/api/{api_path}"

def choose_api_key():
    if len(sys.argv) > 1:
        return str(sys.argv[1]).strip()
    else:
        return API_KEY


def add_categories(categories, category_id=HOME_CAT_ID):
    category_dict = prestashop.get('categories', options={'schema': 'blank'})
    description = "Category " if category_id == HOME_CAT_ID else "Subcategory "
    
    category_assignment = {}
    for category in categories:
        category_dict["category"]["name"]["language"]["value"] = category
        category_dict["category"]["link_rewrite"]["language"]["value"] = category.lower().replace(" ", "-")
        category_dict["category"]["description"]["language"]["value"] = f"{description} {category}"
        category_dict["category"]["active"] = 1
        category_dict["category"]["id_parent"] = category_id
        new_category_id = prestashop.add('categories', category_dict)['prestashop']['category']['id']

        if category_id == HOME_CAT_ID:
            category_assignment[category] = []
            for subcategory in categories[category]:
                category_assignment[category].append(add_categories([subcategory], new_category_id))
        else:
            category_assignment[category] = new_category_id        
            
    return category_assignment

def match_subcategory(product, categories_assigned:dict):
    category = categories_assigned[product["category"]]
    prod_subcat = product["subcategories"][0]
    for subcategory in category:
        if prod_subcat in subcategory.keys():
            return int(subcategory[prod_subcat])

    return HOME_CAT_ID

def set_quantity(product_id):
    quantity = randint(0,10)

    stock_id = prestashop.get('stock_availables', options={'filter[id_product]': product_id})['stock_availables']['stock_available']['attrs']['id']
    stock_dict = prestashop.get('stock_availables', resource_id=stock_id)
    stock_dict["stock_available"]["quantity"] = quantity
    stock_dict["stock_available"]["depends_on_stock"] = 0

    prestashop.edit('stock_availables', stock_dict)

def add_images(product_id, images):
    images_path = f"{DATA_PATH}{IMAGES_DIR}"
    for image in images:
        image_path = f"{images_path}/{image}"
        file =  io.open(image_path, 'rb')
        image_content = file.read()
        file.close()

        prestashop.add(f"images/products/{product_id}", files=[('image', image, image_content)])

def add_products(products, categories):
    product_dict = prestashop.get('products', options={'schema': 'blank'})

    del product_dict["product"]["position_in_category"]   
    del product_dict["product"]["associations"]["combinations"]

    for product in products:
        subcategory_id = match_subcategory(product, categories)
        price = round(float(product["price"]) / 1.23, 2)

        product_dict["product"]["name"]["language"]["value"] = product["name"]
        product_dict["product"]["link_rewrite"]["language"]["value"] = product["name"].lower().replace(" ", "-")
        product_dict["product"]["description"]["language"]["value"] = product["description"]
        product_dict["product"]["description_short"]["language"]["value"] = product["description"].split(".")[0]
        product_dict["product"]["price"] = price
        product_dict["product"]["active"] = 1
        product_dict["product"]["id_category_default"] = subcategory_id
        product_dict["product"]["id_tax_rules_group"] = 1
        product_dict["product"]["id_shop_default"] = 1
        product_dict["product"]["reference"] = product["id"]
        product_dict["product"]["state"] = 1
        product_dict["product"]["available_for_order"] = 1
        product_dict["product"]["show_price"] = 1
        product_dict["product"]["meta_title"]["language"]["value"] = product["name"]
        product_dict["product"]["meta_description"]["language"]["value"] = product["description"].split(".")[0]
        product_dict["product"]["associations"]["categories"] = {
            "category": [
                {"id": HOME_CAT_ID},
                {"id": subcategory_id }
            ]
        }
        product_id = prestashop.add('products', product_dict)['prestashop']['product']['id']
        set_quantity(product_id)
        add_images(product_id, product["images"])

key = choose_api_key()
url = make_url()

prestashop = PrestaShopWebServiceDict(url, key)

categories = load_json_data()

categories_assigned = add_categories(categories)

products = load_json_data(PRODUCTS_FILE)
add_products(products, categories_assigned)
