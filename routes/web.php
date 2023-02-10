<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

// Route::get('/dasboard', [TitikController::class, 'titik']);

Route::get('/dashboard', function () {
    return view('umum/dashboard', [
        "title" => "Dashboard"
    ]);
});

Route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');

// Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');