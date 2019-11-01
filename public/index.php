<?php
ini_set('display_errors', true);
define('ROOT_DIRECTORY', dirname(__DIR__));

if (file_exists(ROOT_DIRECTORY . '/vendor/autoload.php') === false) {
    exit('Please, install composer.');
}

require ROOT_DIRECTORY . '/vendor/autoload.php';

use MVC\Core\Application;
use MVC\Core\Routing\Route;
use MVC\Core\Routing\Dispatcher;

// Carrega as rotas
require ROOT_DIRECTORY . DIRECTORY_SEPARATOR . 'routes.php';

// Inicializa a aplicação
try {
    $app = new Application(new Route, new Dispatcher, require ROOT_DIRECTORY . '/config.php');
    $app->init();
} catch (Error $e) {
    echo '<h1>' . $e->getMessage() . '</h1>';
} catch (Exception $e) {
    echo '<h1>' . $e->getMessage() . '</h1>';
}
