<?php
namespace Otus\Models\Connect;

use Illuminate\Database\Eloquent\Model;

use PDO;

class DbConnect extends Model
{
    public static function db_connect():object
    {
        return new PDO('pgsql:host=db;dbname=otus','postgres','otus',[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
}