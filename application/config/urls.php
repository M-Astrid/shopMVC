<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 16.10.2019
 * Time: 11:47
 */

// uripattern => path(controller/action/vars)
return array (
    '^$' => 'main',

    '^admin$' => 'admin/index',

    '^admin/products$' => 'admin_products/list',
    '^admin/products/([\d]+)' => 'admin_products/update/$1',
    '^admin/products/create' => 'admin_products/create',
    '^admin/products/delete/([\d]+)' => 'admin_products/delete/$1',

    '^admin/categories$' => 'admin_categories/list',
    '^admin/categories/([\d]+)' => 'admin_categories/update/$1',
    '^admin/categories/create' => 'admin_categories/create',
    '^admin/categories/delete/([\d]+)' => 'admin_categories/delete/$1',
    '^admin/categories/update/([\d]+)' => 'admin_categories/update/$1',

    '^admin/orders$' => 'admin_orders/list',
    '^admin/orders/([\d]+)' => 'admin_orders/detail/$1',
    '^admin/orders/update/([\d]+)' => 'admin_orders/update/$1',
    '^admin/orders/delete/([\d]+)' => 'admin_orders/delete/$1',


    '^signup' => 'auth/signup',
    '^login' => 'auth/login',
    '^logout' => 'auth/logout',
    '^success/register' => 'auth/success/register',

    '^profile$' => 'profile/index',
    '^profile/edit' => 'profile/edit',

    '^news' => 'news',
    '^news/([\d]+)' => 'news/detail/$1',

    '^contact$' => 'contact/index',

    '^catalog$' => 'catalog/index',
    '^catalog/page-([\d]+)' => 'catalog/index/0/$1',
    '^category/([\d]+)$' => 'catalog/index/$1',
    '^category/([\d]+)/page-([\d]+)' => 'catalog/index/$1/$2',

    '^product/([\d]+)' => 'product/detail/$1',

    '^cart/add/([\d]+)$' => 'cart/add/$1',
    '^cart/add/([\d]+)/([\d]+)$' => 'cart/add/$1/$2',
    '^cart/delete/([\d]+)$' => 'cart/delete/$1',
    '^cart/q_up/([\d]+)$' => 'cart/q_up/$1',
    '^cart/q_down/([\d]+)$' => 'cart/q_down/$1',
    '^cart/refresh_prices/([\d]+)$' => 'cart/refresh_prices/$1',
    '^cart$' => 'cart/index',
    '^cart/checkout$' => 'cart/checkout',

    '^success/order$' => 'cart/success/order',
);