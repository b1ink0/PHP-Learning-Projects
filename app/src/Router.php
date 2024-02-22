<?php

declare(strict_types=1);

namespace App;

use App\Attributes\Route;
use App\Enums\Extension;
use App\Enums\ViewName;

/**
 *  Class Router
 * 
 * This class is responsible for routing requests to the appropriate controller actions.
 */
class Router
{
    /**
     * An array to store registered routes.
     *
     * @var array
     */
    private array $routes = [];

    /**
     * Register routes from controllers.
     *
     * This method registers routes by inspecting the provided array of controller classes.
     *
     * @param array $controllers An array of controller classes.
     */
    public function registerRoutes(array $controllers): void
    {
        // Iterate through each controller class provided
        foreach ($controllers as $controller) {
            // Create a ReflectionClass instance for the current controller class
            $reflectionController = new \ReflectionClass($controller);

            // Iterate through each method of the current controller class
            foreach ($reflectionController->getMethods() as $method) {
                // Get all attributes applied to the current method of the controller
                $attributes = $method->getAttributes(Route::class);

                // Iterate through each Route attribute found on the method
                foreach ($attributes as $attribute) {
                    // Instantiate the Route attribute, passing the route path specified in its constructor
                    $route = $attribute->newInstance();

                    // Add the route to the router by calling the addRoute method
                    // with the route path, controller class name, and method name
                    $this->addRoute(
                        $route->route->getPath(),
                        $controller,
                        [
                            'name' => $method->getName(),
                            'param' => $route->route->getMethodName()
                        ]
                    );
                }
            }
        }
    }


    /**
     * Adds a new route to the router.
     *
     * @param string $route The route pattern.
     * @param string $controller The controller class name.
     * @param array $action The controller action method name and method params.
     */
    public function addRoute(string $route, string $controller, array $action): void
    {
        $this->routes[$route] = [
            'controller' => $controller,
            'action' => $action
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
            include VIEW_PATH . ViewName::NotFound->value . Extension::PHP->value;
            return;
        }

        $controller = $this->routes[$uri]['controller'];
        $action = $this->routes[$uri]['action'];
        $controller = new $controller();
        call_user_func_array([$controller, $action['name']], [$action['param']]);
    }
}
