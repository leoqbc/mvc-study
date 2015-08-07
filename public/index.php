<?php
define('PATH', dirname(__DIR__));

if( file_exists(PATH.'/vendor/autoload.php') === false ){
    exit('Please, install composer.');
}

require PATH.'/vendor/autoload.php';
require PATH.'/config.php';

use MVC\Core\Controller;

// Inicializa a aplicação
$app = new Controller();

$app->init();