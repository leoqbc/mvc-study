<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

use MVC\Core\Controller;

// Inicializa a aplicação
$app = new Controller();

$app->init();