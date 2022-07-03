<?php

use App\FOOTMAN\Services\App;
use App\FOOTMAN\Services\Request;
use App\Http\Controllers\HomeController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

/**
 * این قسمت کانفیگ دیتابیس انجام میشود
 */
$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USERNAME'],
        'password' => $_SERVER['DB_PASSWORD'],
    ],
];

$app = new App($config);
// dd($app);
// $re = new Request();
// dd($re);
$app->router->get('/', [HomeController::class, 'index']);
$app->router->middleware("admin")->get('/create', [HomeController::class, 'create']);
$app->run();