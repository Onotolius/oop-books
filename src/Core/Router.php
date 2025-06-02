<?php

namespace App\Core;

use App\Controllers\LibraryController;
use App\Models\Library;

class Router
{
    private array $routes;
    private Library $library;

    public function __construct(array $routes, Library $library)
    {
        $this->routes = $routes;
        $this->library = $library;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function dispatch(string $uri, string $method)
    {
        if (!isset($this->routes[$method][$uri])) {
            echo "Route not found";
            return;
        }
        [$controller, $action] = $this->routes[$method][$uri];

        if (!class_exists($controller)) {
            echo "Controller doesnt exist";
            return;
        }

        $controllerInstance = new $controller($this->library);

        if (!method_exists($controllerInstance, $action)) {
            echo "Method doesnt exist";
        }
        $controllerInstance->$action();
    }
}
