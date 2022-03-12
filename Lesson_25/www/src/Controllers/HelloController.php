<?php
namespace Otus\Controllers;
use Otus\View;


class HelloController {
    public function world() {

        View::$name = 'Hello, world';
        View::$title = "Hello";
        View::template();
    }
}
