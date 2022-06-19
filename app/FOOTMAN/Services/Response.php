<?php

namespace App\FOOTMAN\Services;

class Response
{
    function __construct()
    {
        Headers::set();
    }
     // این قسمت برای استاتوس کد http
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

     //این قسمت برای ریدایرکت میباشد 
    public function redirect(string $path)
    {
        header("location: $path");
    }
}
