<?php

namespace App\Core;

use App\Models\Library;
use App\Controllers\ErrorController;

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
            (new ErrorController())->notFound();
            return;
        }
        [$controller, $action] = $this->routes[$method][$uri];

        if (!class_exists($controller)) {
            (new ErrorController())->notFound();
            return;
        }

        $controllerInstance = new $controller($this->library);

        if (!method_exists($controllerInstance, $action)) {
            (new ErrorController())->notFound();
        }
        $controllerInstance->$action();
    }
}
