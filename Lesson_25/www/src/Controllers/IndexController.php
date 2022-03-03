<?php
namespace Otus\Controllers;
use Otus\Database;
use Otus\View;
use Otus\Models\Eloquent\User as EloquentUser;

class IndexController {
    public function action() {
//$a = 1;
//       $users = EloquentUser::all();
//////        var_dump($users);
//        foreach ($users as $u){
//            echo $u -> username . '<br>';
//        }
//        View::$name = 'Hello, User';
//        View::$title = 'User';
//        View::open();

        if (!empty($_GET['action']) && $_GET['action'] == 'auth' && empty($_SESSION['user_id'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = EloquentUser::all()-> where('username', '=', "$username")-> where('password', '=', "$password") ;
            foreach ($result as $u){
                $a=$u->id;
                if (!$a) {
                    echo '<h2>Невреное имя пользователя или пароль!</h2><br>';
                } else {
                    $_SESSION['user_id'] = $u->id;
                    $_SESSION['name'] = $username;
                    echo $_SESSION['name'];
                }

            }
        }
        if (empty($_SESSION['user_id'])) {
        View::authenticate();
        }
        else {
            View::$title = "Hello";
            View::$name = "Добро пожаловать, {$_SESSION['name']}";
            View::open();
        }
    }
}

