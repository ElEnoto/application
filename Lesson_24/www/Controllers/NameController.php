<?php
namespace Otus\Mvc\Controllers;

use Otus\Mvc\src\View;

class NameController {
    public function action() {
        View::render('User');
    }
}