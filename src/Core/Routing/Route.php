<?php
namespace MVC\Core\Routing;

class Route
{
    protected static $routes = [];

    public $method;
    
    public $uri;

    public $handler;

    public static function __callStatic($method, $params)
    {
        $route = new Route();
        $route->method =  strtoupper($method);
        $route->uri = $params[0];
        $route->handler = $params[1];
        self::$routes[] = $route;
    }

    public function routes()
    {
        return self::$routes;
    }
}