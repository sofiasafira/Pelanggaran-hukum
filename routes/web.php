<?php

use App\Http\Controllers\DataPelanggaranController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DesaController;
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

//bagian umum
Route::get('/', [UserController::class, 'home']);

Route::get('/dashboardumum', "App\Http\Controllers\DashboardController@index");
Route::get('/tentang', function () {
    return view('tentang', [
        "title" => "Tentang"
    ]);
});

Route::get('/coba', function () {
    return view('admin/coba', [
        "title" => "Tentang"
    ]);
});


// bagian admin
Route::get('/landing-page', [UserController::class, 'index']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/dashboard', [UserController::class, 'dashboard']);
Route::get('/dashboard', "App\Http\Controllers\UserController@dashboard");
Route::get('/profil', [UserController::class, 'profil']);



// crud data pelanggaran
Route::resource('admin', DataPelanggaranController::class);
Route::get('/baru', "App\Http\Controllers\UserController@index");
Route::get('/edit/{kode_pelanggaran}', "App\Http\Controllers\UserController@edit");
Route::get('/admin/delete/{kode_pelanggaran}', 'App\Http\Controllers\DataPelanggaranController@delete')->name('admin.delete');
Route::get('/detail/{kode_pelanggaran}', [DataPelanggaranController::class, 'show'])->name('admin.show');


// crud data klasifikasi
Route::resource('klasifikasi', KlasifikasiController::class);
Route::get('/klasifikasi/edit/{kode_klasifikasi}', [KlasifikasiController::class, 'edit'])->name('klasifikasi.edit');
Route::put('/klasifikasi/{kode_klasifikasi}/update', [KlasifikasiController::class, 'update'])->name('klasifikasi.update');


// crud data kecamatan
Route::resource('kecamatan', KecamatanController::class);
Route::get('/editkecamatan/{kode_kec}/edit', [KecamatanController::class, "edit"]);
Route::put('/editkecamatan/{kode_kec}', [KecamatanController::class, "update"]);


// crud data desa
Route::resource('desa', DesaController::class);
Route::get('/editdesa/{kode_des}/edit', [DesaController::class, "edit"]);
Route::post('/editdesa/{kode_des}/update', [DesaController::class, "update"])->name('desa.update');





// dpopdown ajax direktori dan klasifikasi
Route::get('/add_item_pelanggaran', [UserController::class, 'getDirektoris']);
Route::get('/add_item_pelanggaran/{kode_direktori_id}/{kode_jenis_id}', [UserController::class, 'getKlasifikasi']);

// dpopdown ajax kecamatan dan desa
Route::get('/des', [UserController::class, 'getKecamatans']);
Route::get('/des/{kode_kec_id}', [UserController::class, 'getDesa']);




Route::get('/kecamatan/{kode_kec}', function($kode_kec) {
    $kecamatan = Kecamatan::where('kode_kec', $kode_kec)->first();
    return response()->json([
        'geojson_kec' => $kecamatan->geojson_kec
    ]);
});

Route::get('/geojson/kecamatan/{kode_kec}', [KecamatanController::class, 'getGeoJSONByKodeKec']);
Route::get('/geojson/desa/{kode_des}', [DesaController::class, 'getGeoJSONByKodeDes']);

Route::put('/admin/update/{kode_pelanggaran}', [DataPelanggaranController::class, 'update'])->name('admin.update');

