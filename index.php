<?php

if(file_exists('vendor/autoload.php')===false){
    exit("Please, install the composer.");
}

require 'vendor/autoload.php';
require 'config.php';

use MVC\Core\Controller;

// Inicializa a aplicação
$app = new Controller();

$app->init();