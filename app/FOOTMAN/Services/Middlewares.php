<?php
namespace App\FOOTMAN\Services;

use App\Http\Middlewares\Kernel;

class Middlewares
{
    public static function set()
    {
        foreach(Kernel::$Routemiddlewares as $key => $value)
        {
            foreach($value::handle() as $k => $v)
            {
                dd($v);
            }
        }
    }
}