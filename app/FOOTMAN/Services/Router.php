<?php

namespace App\FOOTMAN\Services;

class Router
{
    public Request $request;
    public Response $response;
    // این آرایه برای این است که
    // مسیر و متد را بدست بیاوریم
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        // اینجا مسیر مورد نظر را میگیریم
        $path = $this->request->get_path();
        // اینجا متد مورد نظر را میگیریم
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;

        if(!$callback) {
            // در صورتیکه صفحه مورد نظر پیدا نشود
            // این خطا اعمال شود
            //return $this->response->setStatusCode("404");
        }

        // در صورتیکه رشته باشد 
        if(is_string($callback)) {
            echo '<pre>';
            var_dump($callback);
            exit;
            echo '</pre>';
            return $this->view($callback);
        }

        if(is_array($callback)){}
        
        // این متد در اصل پارامتر یک نابع را برمیگرداند
        return call_user_func($callback);

        // if(is_array($callback)) {
        //     $controller = $callback[0];
        //     Application::$app->controller = $controller;
        //     echo '<pre>';
        //     var_dump($callback);
        //     exit;
        //     echo '</pre>';
        //     return $callback;
        // }

    }

    // این تابع در اصل یک ویو برمیگرداند
    public function view($view) {
        include_once __DIR__ . "/../../resources/views/" . $view . ".php";
    }
}