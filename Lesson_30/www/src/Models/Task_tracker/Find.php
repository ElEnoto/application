<?php
namespace Otus\Models\Task_tracker;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Find
{
    public static $error = null;
    public static function find_content():array|string
    {
        $add_content = [];
        if (empty($_POST['id']) and empty($_POST['task']) and empty($_POST['firstname']) and empty($_POST['lastname'])and empty($_POST['date'])) {
            return $add_content;
        }
        if (!empty($_POST['id']) and !empty($_POST['task']) and !empty($_POST['firstname']) and !empty($_POST['lastname'])) {
            if (preg_match('/^\+?\d+$/', $_POST['id'])) {
                $add_content['ID'] = $_POST['id'];
                $add_content['task'] = $_POST['task'];
                $add_content['last_name'] = $_POST['lastname'];
                $add_content['first_name'] = $_POST['firstname'];
                return $add_content;
            } else {
                Find::$error = 'Поле "Номер" должно быть числом';
                $log = new Logger('name');
                $log->pushHandler(new StreamHandler(__DIR__.'/../my_app.log', Logger::ERROR));
                $log->error('Task wasn\'t added because of fields "Номер" must be integer');
                return Find::$error;
            }
        }
        else {
            $log = new Logger('name');
            $log->pushHandler(new StreamHandler(__DIR__.'/../my_app.log', Logger::ERROR));
            $log->error('Task wasn\'t added because of fields are empty');
            Find::$error = 'Необходимо заполнить все поля';
            return Find::$error;
        }
    }

}
