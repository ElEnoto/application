<?php

namespace Otus\Mvc\src;


class App {
    protected static $routes = [
        'Hello/Hello-world' => ['Hello','world'],
        'Hi' => ['Hello','world']
    ];

    public static function run()
    {
        $controller_name = "Otus\\Mvc\\Controllers\\NameController";
        $action_name = "action";

        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        if(array_key_exists($path,self::$routes))
        {
            $controller = self::$routes[$path][0];
            $controller_name = "Otus\\Mvc\\Controllers\\{$controller}Controller";
            $action_name = self::$routes[$path][1];
        } else {
            if($path !== "")
            {
                @list($controller, $action) = explode("/", $path, 2);
                if (isset($controller)){
                    $controller_name = "Otus\\Mvc\\Controllers\\{$controller}Controller";
                }
                if (isset($action)){
                    $action_name = $action;
                }
            }
        }


        // Check controller exists.
        if(!class_exists($controller_name,true)) {
            //redirect to 404
            View::render('404');
        }

        if(!method_exists($controller_name, $action_name)) {
            //redirect to 404
            View::render('404');
        }

        $controller = new $controller_name();
        $controller->$action_name();
    }

}