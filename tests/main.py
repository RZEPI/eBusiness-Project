import time
from selenium import webdriver
from selenium.webdriver import ActionChains, Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as ec
from selenium.webdriver.support.wait import WebDriverWait

chrome_options = webdriver.ChromeOptions()
chrome_options.add_argument("--ignore-ssl-errors=yes")
chrome_options.add_argument("--ignore-certificate-errors")
chrome_options.add_argument("--start-maximized")
chrome_options.add_experimental_option("detach", True)
driver = webdriver.Chrome(options=chrome_options)
SHOP_PAGE = "https://localhost:18434"
MENU_SELECTORS = ["#category-58 > a", "#category-69 > a", "#category-79 > a", "#category-88 > a"]
def read_test_number(filename="test_number.txt"):
    try:
        with open(filename, 'r') as file:
            test_number = int(file.read().strip())
        return test_number
    except FileNotFoundError:
        return 0

def write_test_number(filename="test_number.txt"):
    with open(filename, 'w') as file:
        file.write(str(TEST_NUMBER + 1))

def return_to_main_page():
    main_page = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#_desktop_logo > a > img")))
    main_page.click()
    return

def continue_shopping():
    continue_shopping = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#blockcart-modal > div > div > div.modal-body > div > div.col-md-7 > div > div > button")))
    time.sleep(2)
    continue_shopping.click()
    return

def return_to_category():
    return_button = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#wrapper > div > nav > ol > li:nth-child(3) > a > span")))
    time.sleep(2)
    return_button.click()
    return

def add_to_cart(ammount):
    # setting the ammount of products to add to cart
    for i in range(ammount - 1):
        driver.find_element(By.CSS_SELECTOR, "#add-to-cart-or-refresh > div.product-add-to-cart.js-product-add-to-cart > div > div.qty > div > span.input-group-btn-vertical > button.btn.btn-touchspin.js-touchspin.bootstrap-touchspin-up > i").click()
        time.sleep(0.5)
    # add to cart
    driver.find_element(By.CSS_SELECTOR, "#add-to-cart-or-refresh > div.product-add-to-cart.js-product-add-to-cart > div > div.add > button").click()
    # go back to shop
    continue_shopping()
    return_to_main_page()
    return

def test_searchbar():
    search_bar = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#search_widget > form > input.ui-autocomplete-input")))
    search_bar.send_keys("air", Keys.RETURN)
    time.sleep(2)
    item = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#js-product-list > div.products.row > div:nth-child(3) > article > div > div.thumbnail-top > a > img")))
    time.sleep(2)
    item.click()
    add_to_cart(1)
    return

def go_to_cart():
    cart = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#_desktop_cart > div > div > a > span.hidden-sm-down")))
    time.sleep(2)
    cart.click()
    return

def remove_from_cart(amount):
    go_to_cart()
    for i in range(amount):
        time.sleep(1)
        remove = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, f"#main > div > div.cart-grid-body.col-xs-12.col-lg-8 > div > div.cart-overview.js-cart > ul > li:nth-child({amount - i}) > div > div.product-line-grid-right.product-line-actions.col-md-5.col-xs-12 > div > div.col-md-2.col-xs-2.text-xs-right > div > a > i")))
        remove.click()
    time.sleep(2)
    return

def register_account():
    login_button = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#_desktop_user_info > div > a > span")))
    time.sleep(2)
    login_button.click()
    register_button = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#content > div > a")))
    time.sleep(2)
    register_button.click()
    gender_button = WebDriverWait(driver, 10).until(ec.presence_of_element_located((By.CSS_SELECTOR, "#field-id_gender-1")))
    time.sleep(2)
    gender_button.click()
    name_field = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#field-firstname")))
    time.sleep(2)
    name_field.send_keys("Matt")
    surname_field = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#field-lastname")))
    time.sleep(2)
    surname_field.send_keys("Smith")
    mail_field = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#field-email")))
    time.sleep(2)
    mail_field.send_keys(f"testmail{TEST_NUMBER}@gmail.com")
    write_test_number()
    password_field = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#field-password")))
    time.sleep(2)
    password_field.send_keys("password123")
    RODO_button = WebDriverWait(driver, 10).until(ec.presence_of_element_located((By.CSS_SELECTOR, "#customer-form > div > div:nth-child(6) > div.col-md-6 > span > label > input[type=checkbox]")))
    time.sleep(2)
    RODO_button.click()
    TOS_button = WebDriverWait(driver, 10).until(ec.presence_of_element_located((By.CSS_SELECTOR, "#customer-form > div > div:nth-child(8) > div.col-md-6 > span > label > input[type=checkbox]")))
    time.sleep(2)
    TOS_button.click()
    submit_button = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#customer-form > footer > button")))
    time.sleep(2)
    submit_button.click()

def make_order():
    go_to_cart()
    proceed_to_checkout = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#main > div > div.cart-grid-right.col-xs-12.col-lg-4 > div.card.cart-summary > div.checkout.cart-detailed-actions.js-cart-detailed-actions.card-block > div > a")))
    time.sleep(2)
    proceed_to_checkout.click()
    adress_field = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#field-address1")))
    time.sleep(2)
    adress_field.send_keys("Testowa 21")
    postal_code_field = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#field-postcode")))
    time.sleep(2)
    postal_code_field.send_keys("80-180")
    city_field = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#field-city")))
    time.sleep(2)
    city_field.send_keys("Gdańsk")
    continue_button = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#delivery-address > div > footer > button")))
    time.sleep(2)
    continue_button.click()
    delviery_button = WebDriverWait(driver, 10).until(ec.presence_of_element_located((By.CSS_SELECTOR, "#delivery_option_9")))
    time.sleep(2)
    delviery_button.click()
    comment_field = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#delivery_message")))
    time.sleep(2)
    comment_field.send_keys("Testowa wiadomość")
    continue_button2 = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#js-delivery > button")))
    time.sleep(2)
    continue_button2.click()
    payment_button = WebDriverWait(driver, 10).until(ec.presence_of_element_located((By.CSS_SELECTOR, "#payment-option-2")))
    time.sleep(2)
    payment_button.click()
    agree_button = WebDriverWait(driver, 10).until(ec.presence_of_element_located((By.CSS_SELECTOR, "#conditions_to_approve\[terms-and-conditions\]")))
    time.sleep(2)
    agree_button.click()
    order_button = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#payment-confirmation > div.ps-shown-by-js > button")))
    time.sleep(2)
    order_button.click()
    time.sleep(2)
    return_to_main_page()
    return

def check_order_status():
    account_button = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#_desktop_user_info > div > a.account > span")))
    time.sleep(2)
    account_button.click()
    order_history_button = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#history-link > span > i")))
    time.sleep(2)
    order_history_button.click()
    time.sleep(2)
    return

def download_invoice():
    check_order_status()
    download_button = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, "#content > table > tbody > tr > td.text-sm-center.hidden-md-down > a > i")))
    time.sleep(2)
    download_button.click()
    time.sleep(2)
    return_to_main_page()
    return

def select_product(category, subcategory, product, amount):
    menu = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, category)))
    ActionChains(driver).move_to_element(menu).perform()
    submenu = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, subcategory)))
    time.sleep(1)
    submenu.click()

    product = WebDriverWait(driver, 10).until(ec.element_to_be_clickable((By.CSS_SELECTOR, product)))
    time.sleep(1)
    product.click()
    add_to_cart(amount)
    return

TEST_NUMBER = read_test_number()

def main():
    print(TEST_NUMBER)
    driver.get(SHOP_PAGE)

    # ADD 10 PRODUCTS TO CART BETA, ONLY ONE ITEM ADDED FOR NOW
    select_product(MENU_SELECTORS[0], "#category-59 > a", "#js-product-list > div.products.row > div:nth-child(4) > article > div > div.thumbnail-top > a > img", 2)
    select_product(MENU_SELECTORS[0], "#category-64 > a", "#js-product-list > div.products.row > div:nth-child(1) > article > div > div.thumbnail-top > a > img", 3)
    select_product(MENU_SELECTORS[0], "#category-66 > a", "#js-product-list > div.products.row > div:nth-child(1) > article > div > div.thumbnail-top > a > img", 4)

    select_product(MENU_SELECTORS[1], "#category-71 > a", "#js-product-list > div.products.row > div:nth-child(2) > article > div > div.thumbnail-top > a > img", 2)
    select_product(MENU_SELECTORS[1], "#category-70 > a", "#js-product-list > div.products.row > div:nth-child(5) > article > div > div.thumbnail-top > a > img", 3)
    select_product(MENU_SELECTORS[1], "#category-75 > a", "#js-product-list > div.products.row > div:nth-child(6) > article > div > div.thumbnail-top > a > img", 2)

    select_product(MENU_SELECTORS[2], "#category-82 > a", "#js-product-list > div.products.row > div > article > div > div.thumbnail-top > a > img", 1)
    select_product(MENU_SELECTORS[2], "#category-84 > a", "#js-product-list > div.products.row > div:nth-child(3) > article > div > div.thumbnail-top > a > img", 5)
    select_product(MENU_SELECTORS[2], "#category-81 > a", "#js-product-list > div.products.row > div:nth-child(2) > article > div > div.thumbnail-top > a > img", 2)

    select_product(MENU_SELECTORS[3], "#category-89 > a", "#js-product-list > div.products.row > div:nth-child(1) > article > div > div.thumbnail-top > a > img", 3)

    # SEARCH PRODUCT BY NAME AND ADD TO CART
    test_searchbar()

    # REMOVE ITEMS FROM CART BETA, NO REAL PRODUCTS IN STORE YET, ONLY 2 REMOVED FOR NOW
    remove_from_cart(3)

    return_to_main_page()
    # REGISTER NEW ACCOUNT
    register_account()

    # MAKE ORDER
    make_order()

    # CHECK ORDER STATUS
    check_order_status()

    return_to_main_page()
    # DOWNLOAD INVOICE
    download_invoice()

    time.sleep(5)
    driver.quit()

main()
