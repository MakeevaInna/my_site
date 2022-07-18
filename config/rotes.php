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
    'existence' => [
        'controller' => 'existence',
        'action' => 'existence',
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
    'cart' => [
        'controller' => 'cart',
        'action' => 'add',
    ]
];
