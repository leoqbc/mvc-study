<?php
namespace MVC\Core;

class View 
{
    static public function render($file, array $data=[]) 
    {
        extract($data);
        require ROOT_DIRECTORY . "/views/$file.php";
    }
    
    static public function template($file, array $data=[]) 
    {
        ob_start();
        self::render('partials/header', $data);
        self::render($file, $data);
        self::render('partials/footer', $data);
        ob_flush();
    }
}