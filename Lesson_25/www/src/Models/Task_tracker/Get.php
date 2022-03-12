<?php
namespace Otus\Models\Task_tracker;
use Otus\Models\Authenticate\Authenticate;

use Illuminate\Database\Eloquent\Model;

use PDO;

class Get extends Model
{
    public $timestamps = false;

    public static function get_tasks(){

            $pdo = Authenticate::db_connect();
            $result = $pdo->prepare('select * from tasks order by "date"');
            $result->execute();
            $data = $result->fetchAll();
            return $data;

    }

}
