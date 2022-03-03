<?php
namespace Otus\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;

    public function authenticate_by_token () {
        $pdo = db_connect();
        $result = $pdo->prepare('select id, username from users where remember_token = ?');
        $result->execute([$token]);
        if($result->rowCount() == 0)
            return false;
        return $result->fetchAll()[0];





    }
}