<?php
namespace Otus;

class View
{
    public static $name;
    public static $title;
    public static $content;
    static function tamplate() {
        require_once 'Views/tamplate.php';
        exit();
    }
    static function authenticate() {
        require_once 'Views/authenticate.php';
        exit();
    }
    static function show_tasks() {
        require_once 'Views/show_tasks.php';
        exit();
    }
    static function show_tasks_admin() {
        require_once 'Views/show_tasks_admin.php';
        exit();
    }
}



