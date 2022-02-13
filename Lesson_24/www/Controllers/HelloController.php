<?php
namespace Otus\Mvc\Controllers;

use Otus\Mvc\src\View;

class HelloController {
    public function world() {
        View::render('Hi');
    }
}
