<?php

namespace Otus\Env\Controllers;

use Rivsen\Demo\Hello;

class IndexController
{
    public function index()
    {
        echo (new Hello())->hello();
    }

    public function home()
    {
        echo (new Hello())->hello()." this is a test!";
    }
}