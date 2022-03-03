<?php
namespace Otus\Controllers;
use Otus\View;


class HelloController {
    public function world() {

        View::$name = 'Hello, world';
        View::$title = "Добро пожаловать {$_SESSION['name']}";
        View::open();
    }
}
