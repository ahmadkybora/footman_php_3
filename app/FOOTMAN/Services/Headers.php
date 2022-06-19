<?php

namespace App\FOOTMAN\Services;

class Headers
{
    public static function set()
    {
        header("Cache-Control: no-cache");
        header("Content-type: text/plain");
    }
}