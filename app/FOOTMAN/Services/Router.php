<?php

namespace App\FOOTMAN\Services;

use App\Http\Middlewares\Kernel;

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

    public function middleware($midleware)
    {
        foreach(Kernel::$Routemiddlewares as $key => $value)
        {
            if($key == $midleware)
                $value::handle();
        }
        return $this;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        // $path = $this->request->uri();
        // $method = $this->request->method();
        // $callback = $this->routes[$method][$path];

        // if (!$callback) {
        //     Application::$app->controller->setLayout('_404');
        //     $this->response->setStatusCode(404);
        //     return $this->renderView('_404');
        // }

        // if (is_string($callback))
        //     return $this->renderView($callback);

        // if (is_array($callback)) {
        //     Application::$app->controller = new $callback[0]();
        //     $callback[0] = Application::$app->controller;
        // }

        // return call_user_func($callback, $this->request);
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
        // return call_user_func($callback);
        return call_user_func($callback, $this->request);
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