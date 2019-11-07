<?php

// определяем корневую папку, как ROOT

define('ROOT', dirname(__FILE__));


// стартуем сессию

session_start();


// подключаем файлы ядра

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';


// подключаем автозагрузку классов через composer

require_once 'vendor/autoload.php';


// подключаем RedBean

require_once 'libs/rb.php';
R::setup( 'mysql:host=localhost;dbname=tinymvc',
    'root', '' );


// цепляем и запускаем маршрутизатор

require_once 'core/router.php';
$router = new Router();
$router->start();
