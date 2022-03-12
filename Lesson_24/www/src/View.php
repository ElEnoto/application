<?php
namespace Otus;

class View
{
    public static $name;
    public static $title;
    static function open() {
        require_once 'Views/tamplate.php';
        exit();
    }
}
//    static function render(string $view, array $data = []) {
//        extract($data, EXTR_OVERWRITE);
//        require_once implode(DIRECTORY_SEPARATOR, [$_SERVER['DOCUMENT_ROOT'], 'Public/Views', "$view.php"]);
//        exit();
//    }
//public function __construct ($view){
//    $this->view = $view;
//}

