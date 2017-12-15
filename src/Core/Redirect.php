<?php
namespace MVC\Core;

class Redirect
{
    protected static function to($uri) 
    {
        header("Location: $uri");
    }
}