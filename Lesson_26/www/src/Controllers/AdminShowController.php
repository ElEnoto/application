<?php
namespace Otus\Controllers;

use Otus\Models\Task_tracker\Get;
use Otus\View;

class AdminShowController {
    public static function show_task():void
    {
        $content = Get::get_tasks();
        View::$content = $content;
        View::$title = "Tasks";
        View::$name = "Добро пожаловать, {$_SESSION['name']}";
        View::show_tasks_admin();
    }
}