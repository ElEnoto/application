<?php
namespace Otus\Models\Task_tracker;
use Otus\Models\Authenticate\Authenticate;

use Illuminate\Database\Eloquent\Model;

use PDO;

class Add extends Model
{
    public static $error = null;
    public $timestamps = false;
    public static function find_content(){
        $add_content = [];
        if (empty($_POST['id']) and empty($_POST['task']) and empty($_POST['firstname']) and empty($_POST['lastname'])and empty($_POST['date'])) {
            return $add_content;
        }
        if (!empty($_POST['id']) and !empty($_POST['task']) and !empty($_POST['firstname']) and !empty($_POST['lastname'])) {
            if (preg_match('/^\+?\d+$/', $_POST['id'])) {
                $add_content['ID'] = $_POST['id'];
                $add_content['task'] = $_POST['task'];
                $add_content['last_name'] = $_POST['lastname'];
                $add_content['first_name'] = $_POST['firstname'];
                return $add_content;
            } else {
                Add::$error = 'Поле "Номер" должно быть числом';
                return Add::$error;
            }
        }
        else {
            Add::$error = 'Необходимо заполнить все поля';
            return Add::$error;
        }
    }
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
