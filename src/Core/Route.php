<?php

namespace App\Core;

class Route
{
    private static array $routes = [];

    public static function get(string $uri, array $action)
    {
        self::$routes["GET"][$uri] = $action;
    }

    public static function post(string $uri, array $action)
    {
        self::$routes["POST"][$uri] = $action;
    }

    /**
     * @return array
     */
    public static function getRoutes(): array
    {
        return self::$routes;
    }
}
