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
    
    public function testeAction()
    {
        View::template('site/index');
    }
    
    public function templateAction()
    {
        View::render('templateFull');
    }
    
    public function testAction()
    {
        $robot = new \MVC\Models\Robot();
        $robot->get(1);
        var_dump($robot);
    }
}

 
