<?php

use App\Controllers\HomeController;
require __DIR__ . '/../../src/Router.php';

$router = new \App\Router();

$router->get('/', HomeController::class, 'index');
$router->get('/created', HomeController::class, 'created');
$router->post('/store', HomeController::class, 'store');
$router->get('/cidadaos', HomeController::class, 'getCidadaos');

$router->dispatch();