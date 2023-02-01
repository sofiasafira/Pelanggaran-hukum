<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard', [
            "title" => "dashboard"
        ]);
    }
}
