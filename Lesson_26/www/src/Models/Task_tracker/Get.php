<?php
namespace Otus\Models\Task_tracker;

use Otus\Models\Connect\DbConnect;


class Get
{
    public static function get_tasks():array
    {
            $pdo = DbConnect::db_connect();
            $result = $pdo->prepare('select * from tasks order by "date"');
            $result->execute();
            $data = $result->fetchAll();
            return $data;
    }
}
