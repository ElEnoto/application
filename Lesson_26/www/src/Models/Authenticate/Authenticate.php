<?php
namespace Otus\Models\Authenticate;

use Otus\Models\Connect\DbConnect;

class Authenticate
{
    public $username;
    public $password;
        public static function authenticate(string|int $username, string|int $password): int
        {
            $pdo = DbConnect::db_connect();
            $result = $pdo->prepare('select id from users where username = ? and password = ?');
            $result->execute([$username, $password]);
            if($result->rowCount() == 0)
                return false;
            return $result->fetchAll()[0]['id'];
        }
}