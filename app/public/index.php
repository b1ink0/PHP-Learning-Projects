<?php
require __DIR__ . '/../' . 'src/autoloader.php';
require __DIR__ . '/../' . 'src/routes.php';

define('VIEW_PATH', __DIR__ . '/../src/Views/');

$uri = $_SERVER['REQUEST_URI'];

$router->dispatch($uri);
