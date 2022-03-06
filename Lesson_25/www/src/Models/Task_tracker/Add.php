<?php
namespace Otus\Models\Task_tracker;
use Otus\Models\Authenticate\Authenticate;

use Illuminate\Database\Eloquent\Model;

use PDO;

class Add extends Model
{
    public $timestamps = false;

    public static function add_tasks(array $add_content){

            $pdo = Authenticate::db_connect();
            $id = $add_content['ID'];
            $task = $add_content['task'];
            $last_name = $add_content['last_name'];
            $first_name = $add_content['first_name'];
            $result = $pdo->prepare('insert into tasks(id, task, last_name, first_name, date) values (?,?,?,?,?)');
            $result->execute([$id, $task, $last_name, $first_name, date('Y-m-d')]);

    }

}
