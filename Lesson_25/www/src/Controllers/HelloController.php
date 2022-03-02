<?php
namespace Otus\Controllers;
use Otus\View;


class HelloController {
    public function world() {
//        View::render('Hi');
        View::$name = 'Hello, world';
        View::$title = 'Hi';
        View::open();
    }
}
