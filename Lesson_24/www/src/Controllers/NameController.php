<?php
namespace Otus\Controllers;
use Otus\View;


class NameController {
    public function action() {
//      View::render('User');
        View::$name = 'Hello, User';
        View::$title = 'User';
        View::open();

    }
}

