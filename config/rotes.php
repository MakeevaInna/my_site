<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'login' => [
        'controller' => 'account',
        'action' => 'login',
    ],
    'register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
    'account/confirm/([a-zA-Z0-9]+)' => [
        'controller' => 'account',
        'action' => 'confirm',
    ],
    'user' => [
        'controller' => 'account',
        'action' => 'user',
    ],
    'logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],
    'search' => [
        'controller' => 'search',
        'action' => 'search',
    ],
    'pay' => [
        'controller' => 'header',
        'action' => 'pay',
    ],
    'delivery' => [
        'controller' => 'header',
        'action' => 'delivery',
    ],
    'about-us' => [
        'controller' => 'header',
        'action' => 'aboutUs',
    ],
    'vitamins' => [
        'controller' => 'products',
        'action' => 'category',
    ],
    'minerals' => [
        'controller' => 'products',
        'action' => 'category',
    ],
    'vitamins/([a-zA-Z0-9]+)' => [
        'controller' => 'products',
        'action' => 'productsType',
    ],
    'minerals/([a-zA-Z0-9]+)' => [
        'controller' => 'products',
        'action' => 'productsType',
    ],
    '([0-9]+)' => [
        'controller' => 'products',
        'action' => 'product',
    ],
    '([a-zA-Z]+)/([0-9]+)' => [
        'controller' => 'products',
        'action' => 'product',
    ],
    'api/products' => [
        'controller' => 'products',
        'action' => 'productsAll',
    ],
    'all-products' => [
        'controller' => 'products',
        'action' => 'productsAllJs',
    ],
    'cart' => [
        'controller' => 'cart',
        'action' => 'cart',
    ],
    'cart/add/([0-9]+)' => [
        'controller' => 'cart',
        'action' => 'add',
    ],
    'cart/delete/([0-9]+)' => [
        'controller' => 'cart',
        'action' => 'delete',
    ],
    'cart/increment/([0-9]+)' => [
        'controller' => 'cart',
        'action' => 'incrementAmount',
    ],
    'cart/decrement/([0-9]+)' => [
    'controller' => 'cart',
    'action' => 'decrementAmount',
    ],
    'cart/checkout' => [
        'controller' => 'cart',
        'action' => 'checkout',
    ],
    'checkout-fast' => [
        'controller' => 'cart',
        'action' => 'checkoutFast',
    ],
    'checkout-successful' => [
        'controller' => 'cart',
        'action' => 'checkoutSuccessful',
    ],
    'checkout-fast-successful' => [
        'controller' => 'cart',
        'action' => 'checkoutFastSuccessful',
    ],
];
