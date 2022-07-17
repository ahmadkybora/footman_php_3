<?php

namespace App\FOOTMAN\Services;

class Auth extends Model
{
    // public function __construct()
    // {

    // }

    public static function tableName(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return get_object_vars($this);
    } 
}