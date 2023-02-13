<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TitikController;
use App\Http\Controllers\DashboardController;



Route::get('/', [UserController::class, 'home']);



Route::get('/dashboardumum', "App\Http\Controllers\DashboardController@index");

// Route::get('/dashboardumum', [TitikController::class, 'titik']);


// bagian admin
Route::get('/landing-page', [UserController::class, 'index']); 



Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'authenticate']);


Route::get('/dashboard', [UserController::class, 'dashboard']);

Route::get('/data_pelanggaran', [UserController::class, 'data_pelanggaran']);
Route::get('/add_data', [UserController::class, 'add_data']);
Route::get('/add_item_pelanggaran', [UserController::class, 'add_item_pelanggaran']);


//ex
// // Route::get('/dasboard', [TitikController::class, 'titik']);

// Route::get('/dashboard', function () {
//     return view('umum/dashboard', [
//         "title" => "Dashboard"
//     ]);
// });

// Route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');

// // Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
