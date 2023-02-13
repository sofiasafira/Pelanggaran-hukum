<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view('login');
    }

    // public function postlogin(Request &request){
    //     if(Auth::attempt($request->only('email', 'password'))){
    //         return redirect('/dashboard');
    //     }
    //     return redirect('/');
    // }
}
