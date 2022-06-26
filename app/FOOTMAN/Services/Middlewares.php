<?php
namespace App\FOOTMAN\Services;

use App\Http\Middlewares\Kernel;

class Middlewares
{
    public static function set()
    {
        foreach(Kernel::$Routemiddlewares as $key => $value)
        {
            $value::handle();
        }
    }
}