import requests
import json
import math

from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.support import expected_conditions as EC

PRODUCT_PROXY = "https://product-proxy-v2.adtech-prod.nikecloud.com/products"
DEBUG = True
SIDE_LANG = "https://www.nike.com/pl"
PRODUCT_AMOUNT = 240

options = Options()
options.add_argument("--headless")
options.page_load_strategy = 'eager'

def get_product_list(products_json):
    return products_json["data"]["products"]["products"]


def add_subcategories(subcategories, procuct_subcategories):
    for product_subcategory in procuct_subcategories:
        subcategories.add(product_subcategory)

def get_colorway_data(colorway_data):
    name = colorway_data["colorDescription"]
    image = colorway_data["images"]["portraitURL"]
    return name, [image]


def generate_filename(product_name, product_id, i):
    return f"{product_name.replace(' ', '_').replace('/', '')}_{product_id.replace('-', '')}_{i}"


def download_images(product):
    images = []
    for i, image_url in enumerate(product["image_urls"]):
        response = requests.get(image_url)
        if response.status_code == 200:
            filename = generate_filename(product['name'], product['id'], i)
            with open(f"../scrapped-data/images/{filename}.jpg", "wb") as f:
                f.write(response.content)
            images.append(f"{filename}.jpg")
    return images

def get_product_category_data(cloud_product_id, price):
    headers = {"Content-Type": "application/json"}
    data = {
        "country": "pl",
        "experienceProducts": [
            {"cloudProductId": cloud_product_id, "currentPrice": price}
        ],
    }
    response = requests.post(PRODUCT_PROXY, data=json.dumps(data), headers=headers)
    if response.status_code == 200:
        return json.loads(response.content)["hydratedProducts"][0]


def get_product_page_data(url):
    url = url.replace("{countryLang}", SIDE_LANG)

    driver = webdriver.Chrome(options=options)
    driver.get(url)

    try:
        description = driver.find_element(By.CLASS_NAME, "description-preview").text

        wait = WebDriverWait(driver, 20)
        webelement = wait.until(EC.presence_of_element_located((By.CLASS_NAME, "css-1rayx7p")))
        image_container = webelement.find_elements(By.TAG_NAME, "img")

        if len(image_container) > 7:
            image_src = image_container[7].get_attribute("src")
        else:
            image_src = image_container[-1].get_attribute("src")
    except Exception:
        description = None
        image_src = None
    finally:
        driver.quit()

        return description, image_src


def get_product(product_data):
    if product_data["label"] == "SNKRS":
        return None
    
    product = {}
    product["name"] = product_data["title"]
    product["id"] = product_data["id"]
    product["price"] = product_data["price"]["fullPrice"]
    product["color"], product["image_urls"] = get_colorway_data(
        product_data["colorways"][0]
    )
    category_data = get_product_category_data(
        product_data["cloudProductId"], product_data["price"]["fullPrice"]
    )

    description, images = get_product_page_data(product_data['url'])

    if description and images:
        product["description"] = description
        product["image_urls"].append(images)
    else:
        return None


    if category_data:
        product["subcategories"] = category_data["subCategory"]
        product["category"] = category_data["category"]
    else:
        return None
    
    product["images"] = download_images(product)

    return product


def parse_product_list(product_list):
    parsed_products = []
    categories = set()
    subcategories = set()

    for product_data in product_list:
        parsed_product = get_product(product_data)

        if parsed_product:
            parsed_products.append(parsed_product)
            categories.add(parsed_product["category"])
            add_subcategories(subcategories, parsed_product["subcategories"])

    return parsed_products, categories, subcategories


def save_json_to_file(filename, data):
    with open(f"../scrapped-data/{filename}.json", "w", encoding="utf-8") as f:
        f.write(json.dumps(data, indent=4, ensure_ascii=False))


parsed_products = []
categories = set()
subcategories = set()

for i in range(0, math.ceil(PRODUCT_AMOUNT / 24) + 1):
    url = f"https://api.nike.com/cic/browse/v2?queryid=products&anonymousId=CEECF3AC20010BAEB835F89C9708F086&country=pl&endpoint=%2Fproduct_feed%2Frollup_threads%2Fv2%3Ffilter%3Dmarketplace(PL)%26filter%3Dlanguage(pl)%26filter%3DemployeePrice(true)%26searchTerms%3Dmen%26anchor%3D{i*24}%26consumerChannelId%3Dd9a5bc42-4b9c-4976-858a-f159cf99c647%26count%3D24&language=pl&localizedRangeStr=%7BlowestPrice%7D%20%E2%80%93%20%7BhighestPrice%7D"

    response = requests.get(url)

    if response.status_code == 200:
        product_list_data = get_product_list(json.loads(response.content))
        parsed_products_, categories_, subcategories_ = parse_product_list(
            product_list_data
        )
        parsed_products.extend(parsed_products_)
        categories.update(categories_)
        subcategories.update(subcategories_)


if DEBUG:
    print(json.dumps(parsed_products, indent=4))
    print(len(parsed_products))

save_json_to_file("products", parsed_products)
save_json_to_file("categories", list(categories))
save_json_to_file("subcategories", list(subcategories))
