<?php
namespace Otus\Controllers;
use Otus\View;

class HelloController {
    public function world():void
    {
        $view = new View('Hello, world', "Hello", "");
        $view->template();
//        View::$name = 'Hello, world';
//        View::$title = "Hello";
//        View::template();
    }
}
