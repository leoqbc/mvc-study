<?php

namespace MVC\Controllers;
use MVC\Core\Controller;
use MVC\Core\View;

class SiteController extends Controller
{
    public function indexAction() 
    {
        View::template('site/index');
    }
    
    public function helloAction($nome='zé ninguém')
    {
        View::template('site/hello', ['nome' => $nome]);
    }
}

 
