<?php

namespace App\Http\Middlewares;

class Kernel
{
    public static $Headermiddlewares = [
        'cors' => Cors::class,
    ];

    public static $Routemiddlewares = [
        'admin' => Admin::class
    ];
}