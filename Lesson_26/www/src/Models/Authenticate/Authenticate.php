<?php
namespace Otus\Models\Authenticate;

use Illuminate\Database\Eloquent\Model;

use Otus\Models\Connect\DbConnect;
use PDO;

class Authenticate extends Model
{
    public $timestamps = false;
    public $username;
    public $password;



        public static function authenticate(string|int $username, string|int $password): bool|string|int
        {
            $pdo = DbConnect::db_connect();
            $result = $pdo->prepare('select id from users where username = ? and password = ?');
            $result->execute([$username, $password]);
            if($result->rowCount() == 0)
                return false;
            return $result->fetchAll()[0]['id'];
        }

}