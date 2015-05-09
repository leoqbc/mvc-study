<?php
require 'vendor/autoload.php';
require 'config.php';

use MVC\Core\Controller;

// Inicializa a aplicação
$app = new Controller();

$app->init();