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
URI_SECURE = "https://localhost:8080"
HOME_CAT_ID = 2


def load_json_data(file_name=CATEGORIES_FILE):
    with open(f"{DATA_PATH}{file_name}", 'r') as file:
        json_data = json.loads(file.read())
    return json_data

def save_json_data(data, file_name="categories_ids.json"):
    with open(f"{DATA_PATH}{file_name}", 'w') as file:
        file.write(json.dumps(data))

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

def map_categories(categories, categories_assigned):
    if not categories_assigned:
        return [(category, HOME_CAT_ID) for category in categories]
    
    new_categories = []
    for category in categories:
        for category_name, category_id in categories_assigned.items():
            new_categories.append((f"{category_name}-{category}", category_id))

    return new_categories

def add_categories(categories, categories_assigned={}):
    category_dict = prestashop.get('categories', options={'schema': 'blank'})
    description = "Category " if not categories_assigned else "Subcategory "
    categories = map_categories(categories, categories_assigned)
    
    category_assignment = {}
    for category, category_id in categories:
        category_dict["category"]["name"]["language"]["value"] = category
        category_dict["category"]["link_rewrite"]["language"]["value"] = category.lower().replace(" ", "-")
        category_dict["category"]["description"]["language"]["value"] = f"{description} {category}"
        category_dict["category"]["active"] = 1
        category_dict["category"]["id_parent"] = category_id
        new_category_id = prestashop.add('categories', category_dict)['prestashop']['category']['id']
        category_assignment[category] = int(new_category_id)
    return category_assignment

def match_subcategory(product, subcategories_assigned :dict):
    cat_name = f"{product['category']}-{product['subcategories'][0]}"
    return subcategories_assigned.get(cat_name, 1)

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

def add_products(products, subcategories):
    product_dict = prestashop.get('products', options={'schema': 'blank'})

    del product_dict["product"]["position_in_category"]   
    del product_dict["product"]["associations"]["combinations"]

    for product in products:
        subcategory_id = match_subcategory(product, subcategories)
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
subcategories = load_json_data(SUBCATEGORIES_FILE)

categories_assigned = add_categories(categories)
save_json_data(categories_assigned)

subcategories_assigned = add_categories(subcategories, categories_assigned)
products = load_json_data(PRODUCTS_FILE)
add_products(products,subcategories_assigned)
