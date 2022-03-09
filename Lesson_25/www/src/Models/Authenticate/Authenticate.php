<?php
namespace Otus\Models\Authenticate;

use Illuminate\Database\Eloquent\Model;

use PDO;

class Authenticate extends Model
{
    public $timestamps = false;
    public $username;
    public $password;

        public static function db_connect() {
            return new PDO('pgsql:host=db;dbname=otus','postgres','otus',[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        public static function authenticate($username, $password) {
            $pdo = self::db_connect();
            $result = $pdo->prepare('select id from users where username = ? and password = ?');
            $result->execute([$username, $password]);
            if($result->rowCount() == 0)
                return false;
            return $result->fetchAll()[0]['id'];
        }

}