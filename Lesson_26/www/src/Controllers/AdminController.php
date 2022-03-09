<?php
namespace Otus\Controllers;

use Otus\Models\Task_tracker\Add;
use Otus\Models\Task_tracker\Find;
use Otus\View;

class AdminController {
    public static function add_task():void
    {
        $add = Find::find_content();
        if ($add and !Find::$error) {
            Add::add_tasks($add);
            AdminShowController::show_task();
        } elseif (Find::$error) {
            View::$error = Find::$error;
            AdminShowController::show_task();
        }
        else {
            AdminShowController::show_task();
        }
    }
}

