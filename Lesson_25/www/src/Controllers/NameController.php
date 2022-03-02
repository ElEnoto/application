<?php
namespace Otus\Controllers;
use Otus\Database;
use Otus\View;
use Otus\Models\Eloquent\User as EloquentUser;

class NameController {
    public function action() {
//      View::render('User');
//        Database::db_connect();
//        Database::seeAll();
        $users = EloquentUser::all();
        var_dump($users);
//        foreach ($users as $u){
//            echo $u -> username . '<br>';
//        }
//        View::$name = 'Hello, User';
//        View::$title = 'User';
//        View::open();

    }
}

