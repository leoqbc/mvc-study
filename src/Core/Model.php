<?php

namespace MVC\Core;

abstract class Model
{
    protected $mapper;
    protected $error;
    protected static $defaultMapper;
    
    public function __construct($obj=[], $mapper='')
    {
        foreach($obj as $field => $value) {
            $this->$field = $value;
        }
        if ($mapper) {
            $this->setMapper($mapper);
        } else if (self::$defaultMapper){
            $this->mapper = self::$defaultMapper;
        }
    }
    
    /*
     * Injeção static para não precisar ficar injetando o Mapper todo
     * o momento
     */
    public static function setDefaultMapper($defaultMapper) {
        self::$defaultMapper = $defaultMapper;
    }
    
    /*
     * Injeção de dependencia 
     * mapper
     */
    public function setMapper($mapper) 
    {
        $this->mapper = $mapper;
    } 
    
    public function __set($name, $value) 
    {
        $method = 'set' . ucfirst($name);
        if (method_exists($this, $method)) {
            $prop = $this->$method($name, $value);
            if ($this->error) {
                throw new \Exception($this->error, 500);
            }
            $this->$name = $prop;
        }
        $this->$name = $value;
    }
    
    /*
     * Retorna os campos não setados
     */
    public function missing(array $fields)
    {
        return array_diff($fields, array_keys((array)$this));
    }
}

