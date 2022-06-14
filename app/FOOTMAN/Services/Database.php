<?php

namespace App\FOOTMAN\Services;

use PDO;

class Database
{
    public \PDO $pdo;

    /**
     * بوسیله کلاس از قبل ساخته شده در
     * php
     * بنام pdo
     * میتوان به دیتابیس متضل شد
     */
    public function __construct(array $config)
    {
        $dsn = $config['dsn'];
        $user = $config['user'];
        $password = $config['password'];

        try {
            $this->pdo = new \PDO($dsn, $user, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e){
            dd($e->getMessage());
        }
    }
}