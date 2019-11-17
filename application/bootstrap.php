<?php

// определяем корневую папку, как ROOT
define('ROOT', dirname(__FILE__));


// стартуем сессию
session_start();


// подключаем автозагрузку классов через composer
require_once 'vendor/autoload.php';


// подключаемся к БД через RedBean
R::setup( 'mysql:host=localhost;dbname=tinymvc',
    'root', '' );


// запускаем маршрутизатор
$router = new Router();
$router->start();
