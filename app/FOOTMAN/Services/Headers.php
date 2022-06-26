<?php

namespace App\FOOTMAN\Services;

use App\Http\Middlewares\Kernel;
// use ReflectionClass;
// use stdClass;

class Headers
{
    public static function set()
    {
        foreach(Kernel::$Headermiddlewares as $key => $value)
        {
            foreach($value::$headers as $k => $v)
            {
                header($v);
            }
        }

        // dd(Kernel::$middlewares);
        // dd(json_encode((object)Kernel::$middlewares));
        // dd(get_class((object)Kernel::$middlewares));
        // dd(json_encode(Kernel::$middlewares));
        // $Cors = array_values(Kernel::$middlewares);
        // $reflectionClass = new ReflectionClass(get_class((object)$Cors));
        // stdClass::__set_state(array());
        // dd($reflectionClass);
        // $kernel = require_once __DIR__ . "../../../Http/Middlewares/kernel.php";
        // $Cors = array_values($kernel);
        // dd((object)$Cors);
        // foreach((object)$Cors::$headers as $key => $value) {
        //     header($value);
        // }
    }
}