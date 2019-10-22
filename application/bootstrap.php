<?php

// определяем корневую папку, как ROOT

define('ROOT', dirname(__FILE__));

// подключаем файлы ядра
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';

// подключаем RedBean
require_once 'C:\distr\OpenServer\OSPanel\domains\tinymvc\application\libs\rb.php';
R::setup( 'mysql:host=localhost;dbname=tinymvc',
    'root', '' );

// цепляем и запускаем маршрутизатор
require_once 'core/router.php';
$router = new Router();
$router->start();