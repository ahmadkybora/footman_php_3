<?php

namespace App\Http\Middlewares;

class Cors
{
    public static $headers = [
        "Cache-Control: no-cache", 
        "Content-type: text/plain"
    ];
}