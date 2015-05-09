<?php

namespace MVC\Models;

class Pessoas {
    
    public static $lista = [
        'Amanda',
        'Caio',
        'Marcela',
        'Julio'  
    ];
    
    static public function getNome($id) {
        return self::$lista[$id];
    } 
}