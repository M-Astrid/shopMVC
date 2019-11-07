<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 16.10.2019
 * Time: 11:48
 */

// Класс маршрутизатора:
//  • цепляет классы контроллеров, моделей
//  • вызывает экшн контроллера

class Router
{

    private $routes;

    public function __construct()
    {
        // путь к файлу с роутами
        $routes_path = ROOT.'/config/urls.php';
        $this->routes = include($routes_path);
    }


    // возвращает строку запроса
    private function get_URI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }


    public function start()
    {
        // получаем строку запроса
        $uri = $this->get_URI();

        // проверяем на соответствие паттернам, указанным в urls.php
        foreach ($this->routes as $uripattern => $path)
        {
            if(preg_match("~^$uripattern~", $uri))
            {
                //получаем имя контроллера, действия и параметры
                //echo $uripattern;
                echo $path;
                $internal_route = preg_replace("~$uripattern~", $path, $uri);
                //$segments = explode('?', $internal_route);
                //$qs = $segments
                $segments = explode('/', $internal_route);

                $controller_name = array_shift($segments);

                //echo $controller_name.'</br>';

                $controller_name = 'Controller_'.ucfirst($controller_name);

                if ($segments != null)
                {
                    $action_name = 'action_'.array_shift($segments);
                } else $action_name = 'action_index';


                $parameters = $segments;


                // если файл контроллера существует, подключаем его
                $controller_file = ROOT.'/controllers/'.strtolower($controller_name).'.php';
                if (file_exists($controller_file))
                {
                    require_once ($controller_file);
                }


                // создаем объект контроллера и вызываем действие
                $controller_object = new $controller_name;
                $result = call_user_func_array(array($controller_object, $action_name), $parameters);


                // если действие вызвано успешно, прерываем работу контроллера
                if ($result != null)
                {
                    break;
                }
            }
        }
    }
}