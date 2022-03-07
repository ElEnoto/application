<?php
namespace Otus;

class View
{
    public static $name;
    public static $title;
    public static $content;
    static function template():void
    {
        require_once 'Views/template.php';
        exit();
    }
    static function authenticate():void
    {
        require_once 'Views/authenticate.php';
        exit();
    }
    static function show_tasks():void
    {
        require_once 'Views/show_tasks.php';
        exit();
    }
    static function show_tasks_admin():void
    {
        require_once 'Views/show_tasks_admin.php';
        exit();
    }
}



