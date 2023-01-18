<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //untuk admin

    public function home()
    {
        return view('home', [
            "title" => "Home"
        ]);
    }

    public function index()
    {
        return view('index', [
            "title" => "Dashboard"
        ]);
    }

    public function login()
    {
        return view('login', [
            "title" => "login"
        ]);
    }
}
