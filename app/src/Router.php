<?php

declare(strict_types=1);

namespace App;

/**
 *  Class Router
 * 
 * This class is responsible for routing requests to the appropriate controller actions.
 */
class Router
{
    private array $routes = [];

    /**
     * Adds a new route to the router.
     *
     * @param string $route The route pattern.
     * @param string $controller The controller class name.
     * @param string $action The controller action method name.
     * @param array $constructorParams Optional parameters to pass to the controller constructor.
     */
    public function addRoute(string $route, string $controller, string $action, array $constructorParams = []): void
    {
        $this->routes[$route] = [
            'controller' => $controller,
            'action' => $action,
            'constructorParams' => $constructorParams,
        ];
    }

    /**
     * Dispatches the request to the appropriate controller action based on the URI.
     *
     * @param string $uri The request URI.
     */
    public function dispatch(string $uri): void
    {
        $uri = explode('?', $uri)[0];
        $route_exists = array_key_exists($uri, $this->routes);
        if (!$route_exists) {
            include VIEW_PATH . '404' . '.php';
            return;
        }

        $controller = $this->routes[$uri]['controller'];
        $action = $this->routes[$uri]['action'];
        $constructorParams = $this->routes[$uri]['constructorParams'];

        $controller = new $controller(...$constructorParams);
        $controller->$action();
    }
}
