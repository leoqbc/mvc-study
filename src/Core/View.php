<?php

namespace MVC\Core;

class View {
    static public function render($file, array $data=[]) 
    {
        extract($data);
        $_render = self::renderClosure();
        require_once "Views/$file.php";
    }
    
    static public function template($file, array $data=[]) 
    {
        ob_start();
        $_render = self::renderClosure();
        self::render('template/header', $data);
        self::render($file, $data);
        self::render('template/footer', $data);
        ob_flush();
    }
    
    static public function renderClosure()
    {
        return function($file, array $data=[]) {
            self::render($file, $data);
        };
    }
}
