<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 16.10.2019
 * Time: 11:47
 */

// uripattern => path
return array (
    '' => 'main',
    'login' => 'auth/login',
    'signup' => 'auth/signup',
    'news' => 'news',
    'news/([\d]+)' => 'news/detail/$1',
    'catalog' => 'catalog/index',
    'catalog/page-([\d]+)' => 'catalog/index/$1',
    'category/([\d]+)' => 'catalog/category/$1',
    'category/([\d]+)/page-([\d]+)' => 'catalog/category/$1/$2',
    'product/([\d]+)' => 'product/detail/$1',
);