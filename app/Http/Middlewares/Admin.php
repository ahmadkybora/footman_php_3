<?php

namespace App\Http\Middlewares;

use App\FOOTMAN\Services\Middlewares;
use App\FOOTMAN\Services\Request;

class Admin extends Middlewares
{
    // public function __construct()
    // {
    //     $this->handle();
    // }

    public static function handle()
    {
        $request = new Request();
        foreach($request->body() as $key => $value)
        {
            if($key == "name" and $value != 'admin')
            {
                // redirectTo('/');
                return json([
                    'state' => true,
                    'data' => null,
                    'message' => 'Forbidden'
                ], 403);
            }
        }
    }
}