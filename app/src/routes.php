<?php

declare(strict_types=1);

use App\Router;
use App\Controllers\HomeController;
use App\Controllers\SubscriptionController;

/**
 * Instantiate router and define routes.
 */
$router = new Router();

// Listing all controllers
$controllers = [
    HomeController::class,
    SubscriptionController::class
];

// Registering routes using list of controller
$router->registerRoutes($controllers);
