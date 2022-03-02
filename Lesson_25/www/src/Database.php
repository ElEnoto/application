<?php

namespace Otus;
use Illuminate\Database\Capsule\Manager as Capsule;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use PDO;

class Database
{
//    public static function db_connect()
//    {
//        return new PDO('pgsql:host=db; dbname=otus','postgres','otus',[
//            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
//        ]);
//    }
//    public static function seeAll()
//    {
//        $pdo = db_connect();
//        $result = $pdo->prepare('select * from users');
//        $result->execute();
//
//        return $result->fetchAll();
//    }
    public static function config()
    {
        if(PHP_SAPI == "cli")
        {
            return require implode(DIRECTORY_SEPARATOR,[__DIR__,'..','config','database.php']);
        }
        return require implode(DIRECTORY_SEPARATOR,[$_SERVER['DOCUMENT_ROOT'],'config','database.php']);
    }

    public static function bootEloquent()
    {
        $config = self::config();
        $capsule = new Capsule();
        $capsule->addConnection([
            "driver" => $config["driver"],
            "host" => $config["host"],
            "port" => $config["port"],
            "database" => $config["db"],
            "username" => $config["user"],
            "password" => $config["password"]
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public static function bootDoctrine()
    {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $path = PHP_SAPI == "cli" ? implode(DIRECTORY_SEPARATOR, [__DIR__,'..','Models','Doctrine']) : implode(DIRECTORY_SEPARATOR,[$_SERVER['DOCUMENT_ROOT'],'Models','Doctrine']);
        $config = Setup::createAnnotationMetadataConfiguration(array($path), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

        $conn = self::config();

        $entityManager = EntityManager::create($conn, $config);
        return $entityManager;
    }
}