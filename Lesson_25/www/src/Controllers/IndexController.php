<?php
namespace Otus\Controllers;
use Otus\Models\Authenticate\Authenticate;
use Otus\Models\Task_tracker\Get;
use Otus\View;


class IndexController {
    public function action() {
        session_start();


        if (!empty($_GET['action']) && $_GET['action'] == 'auth' && empty($_SESSION['user_id'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = Authenticate::authenticate($username, $password);
            if (!$result) {
                echo '<h2>Невреное имя пользователя или пароль!</h2><br>';
            } else {
                $_SESSION['user_id'] = $result;
                $_SESSION['name'] = $_POST['username'];
            }
        }

        if (empty($_SESSION['user_id'])) {
        View::authenticate();
        }
        elseif ($_SESSION['name'] == "admin") {
            $controller = new AdminController();
            $controller ->add_task();
        } else{
            $content = Get::get_tasks();
            View::$content = $content;
            View::$title = "Tasks";
            View::$name = "Добро пожаловать, {$_SESSION['name']}";
            View::show_tasks();
        }
    }
}

