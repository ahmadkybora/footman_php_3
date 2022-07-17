<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\FOOTMAN\Service\Services\App;
use App\FOOTMAN\Services\Controller;
use App\FOOTMAN\Services\Session;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // dd($_SESSION);
        $user = new User();
        $user->last_name = "montazeri11";
        $user->first_name = "ahmad11";
        $user->username = "kybora11";
        $user->save();

        dd($user->lastInsertId());
        Session::add("SESSION_USER_ID", $user->id);
        // dd(headers_list());
        // $c = require_once(__DIR__ . "/../../../App/FOOTMAN/Services/Localization/config.php");
        // dd($c['lang']);
        // $user = User::create([
        //     'first_name' => 'ghasem',
        //     'last_name' => 'montazeri',
        //     'username' => 'kks'
        // ]);

        // $post = Post::with('users');
        // $user = User::findById(68);
        // $user->update(68);
        // $user = User::delete(67);
        // return json($post);

        // $user = new User();
        // $user->last_name = "montazeri";
        // $user->first_name = "ahmad";
        // $user->username = "kybora";
        // $user->save();
        // dd($user);
        //dd($user->attributes());
        // $b = 
        // [
        //     "helo" => "2",
        //     "b" => "1"
        // ];
        // return json($b);
    }

    public function create()
    {
        echo("ok");
    }
}