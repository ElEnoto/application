<?php
namespace Otus\Models\Task_tracker;


use Illuminate\Database\Eloquent\Model;

use Otus\Models\Connect\DbConnect;


class Get extends Model
{
    public $timestamps = false;

    public static function get_tasks():array
    {
            $pdo = DbConnect::db_connect();
            $result = $pdo->prepare('select * from tasks order by "date"');
            $result->execute();
            $data = $result->fetchAll();
            return $data;
    }

}
