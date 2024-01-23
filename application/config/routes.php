<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index'
    ],
    'catalog' => [
        'controller' => 'catalog',
        'action' => 'index'
    ],
    'catalog/product/(\d+)' => [
        'controller' => 'catalog',
        'action' => 'product'
    ],
    'reviews' => [
        'controller' => 'reviews',
        'action' => 'index'
    ],
    'quastions' => [
        'controller' => 'quastions',
        'action' => 'index'
    ],
    'contact' => [
        'controller' => 'contact',
        'action' => 'index'
    ],
    'about' => [
        'controller' => 'about',
        'action' => 'index'
    ],
    'profile' => [
        'controller' => 'profile',
        'action' => 'index'
    ],
    'profile/edit' => [
        'controller' => 'profile',
        'action' => 'edit'
    ],
    'account/login' => [
        'controller' => 'account',
        'action' => 'login'
    ],
    'account/register' => [
        'controller' => 'account',
        'action' => 'register'
    ]
];