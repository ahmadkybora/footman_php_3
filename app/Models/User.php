<?php

namespace App\Models;

use App\FOOTMAN\Services\Auth;

class User extends Auth
{
    public string $first_name = '';
    public string $last_name = '';
    public string $username = '';

    public static function tableName(): array
    {
        return [
            "table_name" => "users", 
            "foriegn_key" => ""
        ];
    }

    public function attributes(): array
    {
        return get_object_vars($this);
    } 
}