<?php

namespace PrestaShop\Module\PsAccounts\Adapter;

use ReflectionClass;

class ConfigurationKeys
{
    const PSX_UUID_V4 = 'PSX_UUID_V4';

    // PS Shop Account
    const PS_ACCOUNTS_FIREBASE_ID_TOKEN = 'PS_ACCOUNTS_FIREBASE_ID_TOKEN';
    const PS_ACCOUNTS_FIREBASE_REFRESH_TOKEN = 'PS_ACCOUNTS_FIREBASE_REFRESH_TOKEN';
    const PS_ACCOUNTS_FIREBASE_REFRESH_TOKEN_FAILURE = 'PS_ACCOUNTS_FIREBASE_REFRESH_TOKEN_FAILURE';

    // PS User Account
    const PS_ACCOUNTS_FIREBASE_EMAIL = 'PS_ACCOUNTS_FIREBASE_EMAIL';
    const PS_ACCOUNTS_FIREBASE_EMAIL_IS_VERIFIED = 'PS_ACCOUNTS_FIREBASE_EMAIL_IS_VERIFIED';
    const PS_ACCOUNTS_USER_FIREBASE_UUID = 'PS_ACCOUNTS_USER_FIREBASE_UUID';
    const PS_ACCOUNTS_USER_FIREBASE_ID_TOKEN = 'PS_ACCOUNTS_USER_FIREBASE_ID_TOKEN';
    const PS_ACCOUNTS_USER_FIREBASE_REFRESH_TOKEN = 'PS_ACCOUNTS_USER_FIREBASE_REFRESH_TOKEN';
    const PS_ACCOUNTS_USER_FIREBASE_REFRESH_TOKEN_FAILURE = 'PS_ACCOUNTS_USER_FIREBASE_REFRESH_TOKEN_FAILURE';
    const PS_ACCOUNTS_SHOP_UNLINKED_AUTO = 'PS_ACCOUNTS_SHOP_UNLINKED_AUTO';

    // PS Backend User
    const PS_ACCOUNTS_EMPLOYEE_ID = 'PS_ACCOUNTS_EMPLOYEE_ID';

    // API keys
    const PS_ACCOUNTS_RSA_PUBLIC_KEY = 'PS_ACCOUNTS_RSA_PUBLIC_KEY';
    const PS_ACCOUNTS_RSA_PRIVATE_KEY = 'PS_ACCOUNTS_RSA_PRIVATE_KEY';
    const PS_ACCOUNTS_RSA_SIGN_DATA = 'PS_ACCOUNTS_RSA_SIGN_DATA';

    // /!\ Compat with ps_checkout
    const PS_CHECKOUT_SHOP_UUID_V4 = 'PS_CHECKOUT_SHOP_UUID_V4';
    const PS_PSX_FIREBASE_ID_TOKEN = 'PS_PSX_FIREBASE_ID_TOKEN';
    const PS_PSX_FIREBASE_REFRESH_TOKEN = 'PS_PSX_FIREBASE_REFRESH_TOKEN';
    const PS_PSX_FIREBASE_REFRESH_DATE = 'PS_PSX_FIREBASE_REFRESH_DATE';
    const PS_PSX_FIREBASE_EMAIL = 'PS_PSX_FIREBASE_EMAIL';

    /**
     * @return array
     */
    public static function getKeys()
    {
        return (new ReflectionClass(self::class))->getConstants();
    }
}
