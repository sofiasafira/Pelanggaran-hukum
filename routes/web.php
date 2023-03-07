<?php

use App\Http\Controllers\DataPelanggaranController;
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


// crud
Route::resource('admin', DataPelanggaranController::class);

// dpopdown ajax
Route::get('/add_item_pelanggaran', [DataPelanggaranController::class, 'getDirektoris']);
Route::get('/add_item_pelanggaran/{kode_direktori_id}/{kode_jenis_id}', [DataPelanggaranController::class, 'getKlasifikasi']);
