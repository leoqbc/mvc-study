<?php
define("PATH", dirname(__DIR__));

if(file_exists(PATH."/vendor/autoload.php")===false){
  exit("Please, install composer.");
}

require PATH.'/vendor/autoload.php';
require PATH.'/config.php';

use MVC\Core\Application;
use MVC\Core\Routing\Route;
use MVC\Core\Routing\Dispatcher;

// Carrega as rotas
require PATH . '\routes.php';

// Inicializa a aplicação
$app = new Application(new Route, new Dispatcher, require PATH . '/config.php');

$app->init();