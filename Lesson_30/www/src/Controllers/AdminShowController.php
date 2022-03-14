<?php
namespace Otus\Controllers;

use Otus\Models\Task_tracker\Get;
use Otus\View;

class AdminShowController {
    public static function show_task():void
    {
        $content = Get::get_tasks();
        $view = new View("Добро пожаловать, {$_SESSION['name']}","Tasks", $content);
        $view->show_tasks_admin();
    }
}