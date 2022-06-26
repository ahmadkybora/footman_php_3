<?php

namespace App\FOOTMAN\Services;

class Request
{
    public function __construct()
    {
        Middlewares::set();
    }
    
    /**
     * این فانکشن مسیر جاری را میگیرد
     * بوسیله متغییر جهانی
     */
    public function get_path()
    {
        /**
         * اگر مسیر جاری را پیدا کرد
         * و گرنه مقدار مسیر اصلی را برگرداند
         */
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if($position == false) {
            return $path;
        }

        /**
         * از اندیس صفر در 
         * رشته مورد نظر برایتان
         * برمیگرداند
         */
        return substr($path, 0, $position);
    }

    /**
     * اینجا متد مورد نظر را
     * برایتان برمیگرداند
     * که آیا 
     * GET or POST
     */
    public function method()
    {
        /**
         * متد زیر به حروف کوچک
         * تبدیل میکند
         */
        return strtolower($_SERVER['REQUEST_METHOD']);
    }


    /**
     * در صورتیکه متد مورد نظر باشد
     * get
     */
    public function isGet()
    {
        return $this->method === 'get';
    }

    /**
     * در صورتیکه متد مورد نظر باشد
     * post
     */
    public function isPost()
    {
        return $this->method === 'post';
    }

    public function body()
    {
        $body = [];

        if ($this->isGet())
            foreach ($_GET as $key => $value)
                $body[$key] = $value;

        if ($this->isPost())
            foreach ($_POST as $key => $value)
                $body[$key] = $value;

        return $body;
    }
}