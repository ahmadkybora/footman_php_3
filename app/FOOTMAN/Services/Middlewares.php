<?php
namespace App\FOOTMAN\Services;

use App\Http\Middlewares\Admin;
use App\Http\Middlewares\Kernel;

class Middlewares
{
    // public Request $request;
    // public function __construct()
    // {
    //     $this->request = new Request();
    // }
    // public function __construct()
    // {
    //     Admin::class;
    // }

    public static function set()
    {
        foreach(Kernel::$Routemiddlewares as $key => $value)
        {
            $value::handle();
        }
    }
}