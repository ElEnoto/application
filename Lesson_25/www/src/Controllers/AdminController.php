<?php
namespace Otus\Controllers;

use Otus\Models\Task_tracker\Add;
use Otus\Models\Task_tracker\Get;
use Otus\View;

class AdminController {
    public static function add_task()
    {
        $add = Add::find_content();
        if ($add and !Add::$error) {
            Add::add_tasks($add);
            return self::show_task();
        } elseif (Add::$error) {
            View::$error = Add::$error;
            return self::show_task();
        }
        else {
            self::show_task();
        }
    }
    public static function show_task(){
        $content = Get::get_tasks();
        View::$content = $content;
        View::$title = "Tasks";
        View::$name = "Добро пожаловать, {$_SESSION['name']}";
        View::show_tasks_admin();
    }
}

