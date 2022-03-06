<?php
namespace Otus\Controllers;
use Otus\View;


class HelloController {
    public function world() {

        View::$name = 'Hello';
        View::$title = "Hello, world";
        View::tamplate();
    }
}
