<?php

namespace App\Footman\Services\Console;

use App\FOOTMAN\Services\Localization\Localization;

class Commands
{
    private static function modelContent($fileName)
    {
        return "<?php 

namespace App\Models;

use App\Services\Model;

class $fileName extends Model
{
    // FOOTMAN
    public static function tableName(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return [];
    } 
}
        ";
    }

    private static function controllerContent($fileName)
    {
        return "<?php 

namespace App\Http\Controllers;

use App\Services\Controller;

class $fileName extends Controller
{
    // FOOTMAN
}
        ";
    }

    public static function serve()
    {
        `php -S localhost:8000 -t public`;
    }

    public static function makeModel($fileName)
    {
        $className = __DIR__ . "/../../../Models/$fileName.php";
        if(file_exists($className)) {
            echo static::messageAlready();
            die();
        }
        $file = fopen($className, "w");
        $fileContent = static::fileMaker($fileName, "model");
        fwrite($file, $fileContent);
        fclose($file);
        echo static::messageSuccess();
    }

    public static function makeController($fileName)
    {
        $className = __DIR__ . "/../../../Http/Controllers/$fileName.php";

        if(file_exists($className)) {
            static::messageAlready();
            die();
        }
        $file = fopen($className, "w");
        $fileContent = static::fileMaker($fileName, "controller");
        fwrite($file, $fileContent);
        fclose($file);
        static::messageSuccess();
    }

    public static function fileMaker($fileName, $maker) {
        switch($maker) {
            case "model":
                return static::modelContent($fileName);
            break;
    
            case "controller":
                return static::controllerContent($fileName);
            break;
        }
    }

    private static function messageSuccess()
    {
        return new Localization('global-success');
    }

    private static function messageAlready()
    {
        return new Localization('global-already');
    }
}