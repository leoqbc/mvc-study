<?php
namespace MVC\Controllers;

use MVC\Core\View;
use MVC\Core\Redirect;

class SiteController
{
    public function index() 
    {
        View::template('site/index');
    }
    
    public function hello($nome='zé ninguém')
    {
        
    }
}

 
