<?php

declare(strict_types=1);

use App\Router;
use App\Controllers\HomeController;
use App\Controllers\SubscriptionController;

/**
 * Instantiate router and define routes.
 */
$router = new Router();

$router->addRoute('/', HomeController::class, 'index');
$router->addRoute('/subscribe', SubscriptionController::class, 'subscribe');
$router->addRoute('/verify', SubscriptionController::class, 'verify');
$router->addRoute('/unsubscribe', SubscriptionController::class, 'unsubscribe');
