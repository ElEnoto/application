<?php
namespace Otus\Models\Task_tracker;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Otus\Models\Connect\DbConnect;

class Add
{
    public static function add_tasks(array $add_content):void
    {
        try {
            $pdo = DbConnect::db_connect();
            $id = $add_content['ID'];
            $task = $add_content['task'];
            $last_name = $add_content['last_name'];
            $first_name = $add_content['first_name'];
            $result = $pdo->prepare('insert into tasks(id, task, last_name, first_name, date) values (?,?,?,?,?)');
            $log = new Logger('name');
            $log->pushHandler(new StreamHandler(__DIR__.'/../my_app.log', Logger::NOTICE));
            $log->notice('Task was added', ['id' => $id]);
            $result->execute([$id, $task, $last_name, $first_name, date('Y-m-d')]);
        } catch (\Throwable $exception){
            echo 'Something was wrong. We will fix it soon';
        }

    }
}
