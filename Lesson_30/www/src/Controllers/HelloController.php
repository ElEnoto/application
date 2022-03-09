<?php
namespace Otus\Controllers;
use Otus\View;

class HelloController {
    public function world():void
    {
        View::$name = 'Hello, world';
        View::$title = "Hello";
        View::template();
    }
}
