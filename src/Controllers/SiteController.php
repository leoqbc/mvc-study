<?php
namespace MVC\Controllers;

use MVC\Core\View;
use MVC\Core\Redirect;

class SiteController
{
    public function index() 
    {
        View::render('site/index');
    }
    
    public function hello($nome='John Doe')
    {
        View::template('site/hello', [
            'nome' => $nome
        ]);
    }
}

 
