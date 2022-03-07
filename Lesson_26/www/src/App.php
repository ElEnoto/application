<?php

namespace Otus;
use Otus\Controllers\RouteController;

class App {
    public static function run():void
    {
        $controller = new RouteController();
        $route = $controller->route();
        $controller_name = $route[0];
        $action_name = $route[1];
        if(!class_exists($controller_name,true) or !method_exists($controller_name, $action_name)) {
            View::$name = 'Something wrong';
            View::$title = '404 - Not Foud';
            View::template();
        } else {
            $controller = new $controller_name();
            $controller->$action_name();
        }

    }
}