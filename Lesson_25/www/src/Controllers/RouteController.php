<?php
namespace Otus\Controllers;

Class RouteController{
    protected static $routes = [
        'Hello/Hello-world' => ['Hello','world'],
        'Hi' => ['Hello','world']
    ];

    public static function route()
    {
        $controller_name = 'Otus\\Controllers\\IndexController';
        $action_name = "action";

        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        if (array_key_exists($path, self::$routes)) {
            $controller = self::$routes[$path][0];
            $controller_name = "Otus\\Controllers\\{$controller}Controller";
            $action_name = self::$routes[$path][1];
        } else {
            if ($path !== "") {
                list($controller, $action) = explode("/", $path, 2);
                if (isset($controller)) {
                    $controller_name = "Otus\\Controllers\\{$controller}Controller";
                }
                if (isset($action)) {
                    $action_name = $action;
                }
            }
        }
        return [$controller_name, $action_name];
    }
}
