import requests as rq
import json
from prestapyt import PrestaShopWebServiceDict

DATA_PATH = "../scrapped-data"
CATEGORIES_FILE = "/categories.json"
SUBCATEGORIES_FILE = "/subcategories.json"
PRODUCTS_FILE = "/products.json"

API_KEY = "2ACW94YGW4W8H53JCZYGUQG1Y4VYJWM8"
IS_SECURE = False
URI = "http://localhost:8080"
URI_SECURE = "https://localhost:8080"

def load_categories(file_name=CATEGORIES_FILE):
    with open(f"{DATA_PATH}{file_name}", 'r') as file:
        categories = json.loads(file.read())
    return categories

def make_url(api_path=""):
    if IS_SECURE:
        return f"{URI_SECURE}/api/{api_path}"
    else:
        return f"{URI}/api/{api_path}"

def map_categories(categories, categories_assigned):
    if not categories_assigned:
        return [(category, 1) for category in categories]
    
    new_categories = []
    for category in categories:
        for category_name, category_id in categories_assigned.items():
            new_categories.append((f"{category_name}-{category}", category_id))

    return new_categories

def add_categories(categories, categories_assigned={}):
    category_dict = prestashop.get('categories', options={'schema': 'blank'})
    categories = map_categories(categories, categories_assigned)
    
    category_assignment = {}
    for category, category_id in categories:
        category_dict["category"]["name"]["language"]["value"] = category
        category_dict["category"]["link_rewrite"]["language"]["value"] = category.lower().replace(" ", "-")
        category_dict["category"]["description"]["language"]["value"] = f"Category {category}"
        category_dict["category"]["active"] = 1
        category_dict["category"]["id_parent"] = category_id
        new_category_id = prestashop.add('categories', category_dict)['prestashop']['category']['id']
        category_assignment[category] = int(new_category_id)
    return category_assignment

url = make_url()
prestashop = PrestaShopWebServiceDict(url, API_KEY)

categories = load_categories()
subcategories = load_categories(SUBCATEGORIES_FILE)
categories_assigned = add_categories(categories)
add_categories(subcategories, categories_assigned)
