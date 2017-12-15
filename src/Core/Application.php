<?php
namespace MVC\Core;

use MVC\Core\Invoker\Invoke;

class Application
{
    protected $controllers_namespace;

    public function __construct($router, $dispatcher, array $config = [])
    {
        $this->controllers_namespace = '';
        foreach ($config as $key => $value) {
            $this->$key = $value;
        }
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }

    public function init()
    {
        $routeInfo = $this->dispatcher->dispatch($this->router->routes());

        $invoker = new Invoke($this->controllers_namespace);
        
        echo $invoker->run($routeInfo[1], $routeInfo[2]);
    }
}
