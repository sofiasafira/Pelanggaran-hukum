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

Route::get('/landing-page', [UserController::class, 'index']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'authenticate']);

Route::get('/dashboard', [UserController::class, 'dashboard']);

Route::get('/data_pelanggaran', [UserController::class, 'data_pelanggaran']);
Route::get('/add_data', [UserController::class, 'add_data']);
