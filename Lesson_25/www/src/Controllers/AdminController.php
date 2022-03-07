<?php
namespace Otus\Controllers;

use Otus\Models\Task_tracker\Add;
use Otus\Models\Task_tracker\Get;
use Otus\View;

class AdminController {
    public static function add_task(){
        if (empty($_POST['id']) and empty($_POST['task']) and empty($_POST['firstname']) and empty($_POST['lastname'])and empty($_POST['date'])) {
                return self::show_task();
        }
        if (!empty($_POST['id']) and preg_match('/^\+?\d+$/', $_POST['id']) and !empty($_POST['task']) and !empty($_POST['firstname']) and !empty($_POST['lastname'])) {
            $add_content = [];
            $add_content['ID'] = $_POST['id'];
            $add_content['task'] = $_POST['task'];
            $add_content['last_name'] = $_POST['lastname'];
            $add_content['first_name'] = $_POST['firstname'];
            Add::add_tasks($add_content);
            return self::show_task();
        } elseif (!empty($_POST['id']) and !preg_match('/^\+?\d+$/', $_POST['id']) and !empty($_POST['task']) and !empty($_POST['firstname']) and !empty($_POST['lastname'])) {
            echo '<h2>Поле "Номер" должно быть числом</h2> . <br>';
            return self::show_task();
        }
        else {
            echo "<h2>Необходимо заполнить все поля</h2> . <br>";
            return self::show_task();
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

