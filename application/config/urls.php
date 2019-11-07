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
    '^profile' => 'profile/index',
    '^profile/edit' => 'profile/edit',
    '^news' => 'news',
    '^news/([\d]+)' => 'news/detail/$1',
    '^catalog' => 'catalog/index',
    '^catalog/page-([\d]+)' => 'catalog/index/0/$1',
    '^category/([\d]+)' => 'catalog/index/$1',
    '^category/([\d]+)/page-([\d]+)' => 'catalog/index/$1/$2',
    '^product/([\d]+)' => 'product/detail/$1',
);