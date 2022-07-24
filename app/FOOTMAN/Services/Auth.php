<?php

namespace App\FOOTMAN\Services;

use App\Models\User;

class Auth extends Model
{
    // public function __construct()
    // {

    // }

    public static function attempt(array $creditional)
    {
        $user = User::where('username', '=', $creditional['username']);
                    // ->where('password', '=', $creditional['password']);
        dd($user);
    }

    public static function tableName(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return get_object_vars($this);
    } 
}