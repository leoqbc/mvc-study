<?php
namespace MVC\Core\Invoker;

class Invoke
{
    protected $namespace;

    public function __construct(string $namespace = '')
    {
        $this->namespace = $namespace;
    }
    
    public function invokeController($name)
    {
        if (true === class_exists($name)) {
            return new $name;
        }
    }

    public function run($handler, $parameters)
    {
        $handler = str_replace('@', '::', $handler);

        $class_method = explode('::', $handler);

        $class = $class_method[0];
        $method = $class_method[1];

        $class_string = $this->namespace . '\\' . $class;

        $this->classExists($class_string);
        $this->methodExists($class_string, $method);

        $obj = $this->invokeController($class_string);

        return call_user_func_array([$obj, $method], $parameters);
    }

    public function classExists($class)
    {
        if (false === class_exists($class)) {
            throw new InvokeException('Class ' . $class . ' not found');
        }
    }

    public function methodExists($class, $method)
    {
        if (false === method_exists($class, $method)) {
            throw new InvokeException('Method ' . $method . ' not found');
        }
    }
}