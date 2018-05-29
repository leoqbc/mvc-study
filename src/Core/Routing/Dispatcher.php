<?php
namespace MVC\Core\Routing;

use FastRoute;
use FastRoute\RouteCollector;
use MVC\Core\Invoker\Invoke;

class Dispatcher
{
    protected $uri;

    protected $method;

    public function __construct($uri = null, $method = null)
    {
        $this->uri = $uri ?? $_SERVER['REQUEST_URI'];
        $this->method = $metyhod ?? $_SERVER['REQUEST_METHOD'];
    }

    public function dispatch(array $routes)
    {
        $dispatcher = $this->makeRoutes($routes);

        $routeInfo = $dispatcher->dispatch($this->method, $this->uri);

        return $this->handle($routeInfo);
    }

    public function makeRoutes($routes)
    {
        $dispatcher = FastRoute\simpleDispatcher(function(RouteCollector $collection) use ($routes) {
            foreach ($routes as $route) {
                $collection->addRoute($route->method, $route->uri, $route->handler);
            }
        });
        return $dispatcher;
    }

    protected function handle($routeInfo)
    {
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                http_response_code(404);
                throw new RouteError('404 NOT FOUND');
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                http_response_code(405);
                throw new RouteError('METHOD NOT ALLOWED');
                break;
            case FastRoute\Dispatcher::FOUND:
                return $routeInfo;
                break;
            default:
                http_response_code(500);
                throw new \Error('Generic error');
        }
    }
}