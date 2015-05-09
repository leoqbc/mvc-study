<?php

namespace MVC\Models;

class Cliente
{
    public static function getById($id)
    {
        $lista = [
            'Amanda',
            'Caio',
            'Marcela',
            'Julio'
        ];
        return $lista[$id];
    }
}