<?php
namespace Otus;

class View
{
    public $name;
    public $title;
    public $content;
    public static $error = null;
    public function __construct($name, $title, $content){
        $this->name = $name;
        $this->title = $title;
        $this->content = $content;
    }
    public function template():void
    {
        require_once 'Views/template.php';
        exit();
    }
    public static function authenticate():void
    {
        require_once 'Views/authenticate.php';
        exit();
    }
    public function show_tasks():void
    {
        require_once 'Views/show_tasks.php';
        exit();
    }
    public function show_tasks_admin():void
    {
        require_once 'Views/show_tasks_admin.php';
        exit();
    }
}



