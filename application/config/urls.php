<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 16.10.2019
 * Time: 11:47
 */

// uripattern => path
return array (
    '^$' => 'main',

    '^signup' => 'auth/signup',
    '^login' => 'auth/login',
    '^logout' => 'auth/logout',
    '^success' => 'auth/success',

    '^profile$' => 'profile/index',
    '^profile/edit' => 'profile/edit',

    '^news' => 'news',
    '^news/([\d]+)' => 'news/detail/$1',

    '^contact$' => 'contact/index',

    '^catalog' => 'catalog/index',
    '^catalog/page-([\d]+)' => 'catalog/index/0/$1',
    '^category/([\d]+)' => 'catalog/index/$1',
    '^category/([\d]+)/page-([\d]+)' => 'catalog/index/$1/$2',

    '^product/([\d]+)' => 'product/detail/$1',

    'cart/add/([\d]+)' => 'cart/add/$1',
    'cart/delete/([\d]+)' => 'cart/delete/$1',
    'cart/q_up/([\d]+)' => 'cart/q_up/$1',
    'cart/q_down/([\d]+)' => 'cart/q_down/$1',
    'cart/refresh_prices/([\d]+)' => 'cart/refresh_prices/$1',
    'cart' => 'cart/index',
);