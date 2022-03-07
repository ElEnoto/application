<?php
namespace Otus\Controllers;

use Otus\Models\Task_tracker\Add;
use Otus\Controllers\AdminShowController;
use Otus\View;

class AdminController {
    public static function add_task():void
    {
        if (empty($_POST['id']) and empty($_POST['task']) and empty($_POST['firstname']) and empty($_POST['lastname'])and empty($_POST['date'])) {
            AdminShowController::show_task();
        }
        if (!empty($_POST['id']) and !empty($_POST['task']) and !empty($_POST['firstname']) and !empty($_POST['lastname'])) {
            if (preg_match('/^\+?\d+$/', $_POST['id'])) {
            $add_content = [];
            $add_content['ID'] = $_POST['id'];
            $add_content['task'] = $_POST['task'];
            $add_content['last_name'] = $_POST['lastname'];
            $add_content['first_name'] = $_POST['firstname'];
            Add::add_tasks($add_content);
            AdminShowController::show_task();
            } else {
                echo '<h2>Поле "Номер" должно быть числом</h2> . <br>';
                AdminShowController::show_task();
            }
        }
        else {
            echo "<h2>Необходимо заполнить все поля</h2> . <br>";
            AdminShowController::show_task();
        }
    }

}

