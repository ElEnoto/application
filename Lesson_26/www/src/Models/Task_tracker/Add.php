<?php
namespace Otus\Models\Task_tracker;

use Otus\Models\Connect\DbConnect;

class Add
{
    public static function add_tasks(array $add_content):void
    {
            $pdo = DbConnect::db_connect();
            $id = $add_content['ID'];
            $task = $add_content['task'];
            $last_name = $add_content['last_name'];
            $first_name = $add_content['first_name'];
            $result = $pdo->prepare('insert into tasks(id, task, last_name, first_name, date) values (?,?,?,?,?)');
            $result->execute([$id, $task, $last_name, $first_name, date('Y-m-d')]);
    }
}
