<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// bagian admin
Route::get('/', [UserController::class, 'home']);

Route::get('/dashboard', [UserController::class, 'index']);

Route::get('/login', [UserController::class, 'login']);
