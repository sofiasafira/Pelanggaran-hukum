<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DataPelanggaran;
use App\Http\Requests\StoreDataPelanggaranRequest;
use App\Http\Requests\UpdateDataPelanggaranRequest;
use App\Models\Direktori;
use App\Models\Klasifikasi;
use App\Models\Kecamatan;
use App\Models\Desa;


class UserController extends Controller
{
    //untuk admin

    public function home()
    {
        return view('home', [
            "title" => "Home"
        ]);
    }

    public function baru()
    {
        return view('admin/baru', [
            "title" => "Baru"
        ]);
    }

    public function index()
    {
        $users = auth()->user();
        
        $nama_kabupaten = DB::table("kabupatens")->get();
        $titik = DB::table("users")->get();

        $model = new DataPelanggaran;
        $kecamatans = Kecamatan::get();
        $desas = Desa::get();

        // dd((string)$desas[0]["kode_des"]);
        
        $direktoris = Direktori::get();
        $klasifikasis = DB::table("klasifikasis")->get();
        // dd($klasifikasis[0]->kode_klasifikasi);

        $geojson_kecamatan = DB::table("kecamatans")->get();
        $geojson_kabupaten = DB::table("kabupatens")->get();
        $geojson_desa = DB::table("desas")->get();

        $total_pelanggaran = DB::table("data_pelanggarans")->count(); // hitung total pelanggaran
        $pelanggarans = DB::table("data_pelanggarans")->selectRaw('user_id, count(*) as jumlah')
        ->groupBy('user_id')
        ->get();

        return view('admin/baru', compact('geojson_kabupaten', 'model', 'users', 'kecamatans','geojson_kecamatan', 'geojson_desa', 'klasifikasis', 'nama_kabupaten','pelanggarans','titik', 'desas', 'total_pelanggaran'),
        [
            "title" => "Tambah Data Baru",   
            'direktoris' => $direktoris 
        ]);
    }

    public function edit($kode_pelanggaran)
    {
        $data_pelanggaran = \App\Models\DataPelanggaran::find($kode_pelanggaran);
        $direktoris = Direktori::get();
        $klasifikasi = Klasifikasi::get();
        $geojson_kabupaten = DB::table("kabupatens")->get();
        $geojson_kecamatan = DB::table("kecamatans")->get();
        $geojson_desa = DB::table("desas")->get();
        // dd($geojson_desa->keys(), $geojson_desa);
        $kecamatans = Kecamatan::all();
        $desas = Desa::all();
        $users = auth()->user();
        $datas_pelanggaran = DB::table('data_pelanggarans')
        ->join('desas', 'data_pelanggarans.kode_des_id', '=', 'desas.kode_des')
        ->join('kecamatans', 'desas.kode_kec_id', '=', 'kecamatans.kode_kec')
        ->join('direktoris', 'data_pelanggarans.kode_direktori_id', '=', 'direktoris.kode_direktori')
        ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'klasifikasis.kode_klasifikasi')
        ->select('data_pelanggarans.*', 'direktoris.nama_direktori', 'klasifikasis.nama_klasifikasi','desas.nama_des', 'kecamatans.nama_kec')
        ->where('data_pelanggarans.kode_pelanggaran', '=', $kode_pelanggaran)
        ->first();
    

        return view('admin/edit', compact('data_pelanggaran', 'datas_pelanggaran','geojson_kabupaten',  'users', 'kecamatans', 'desas','geojson_kecamatan', 'geojson_desa', 'klasifikasi', 'direktoris'),
        [
            "title" => "Edit Data",   

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

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function dashboard()
    {
        
            $pelanggarandir01 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir01')
            ->count();

            $pelanggarandir02 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir02')
            ->count();

            $pelanggarandir03 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir03')
            ->count();

            $pelanggarandir04 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir04')
            ->count();

            $pelanggarandir05 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir05')
            ->count();

            $pelanggarandir06 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir06')
            ->count();

            $dir012022 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir01')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2022')
            ->count();

            $dir022022 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir02')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2022')
            ->count();
            
            $dir032022 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir03')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2022')
            ->count();
            
            $dir042022 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir04')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2022')
            ->count();
            
            $dir052022 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir05')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2022')
            ->count();
            
            $dir062022 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir06')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2022')
            ->count();

            

            $pelanggarandir = array(
                $pelanggarandir01,
                $pelanggarandir02,
                $pelanggarandir03,
                $pelanggarandir06,
                $pelanggarandir04,
                $pelanggarandir05
            );

            $dir22 = array(
                $dir012022,
                $dir022022,
                $dir032022,
                $dir062022,
                $dir042022,
                $dir052022
            );

            $dir012021 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir01')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2021')
            ->count();

            $dir022021 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir02')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2021')
            ->count();
            
            $dir032021 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir03')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2021')
            ->count();
            
            $dir042021 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir04')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2021')
            ->count();
            
            $dir052021 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir05')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2021')
            ->count();
            
            $dir062021 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir06')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2021')
            ->count();

            $dir21 = array(
                $dir012021,
                $dir022021,
                $dir032021,
                $dir062021,
                $dir042021,
                $dir052021
            );

            $dir012023 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir01')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2023')
            ->count();

            $dir022023 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir02')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2023')
            ->count();
            
            $dir032023 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir03')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2023')
            ->count();
            
            $dir042023 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir04')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2023')
            ->count();
            
            $dir052023 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir05')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2023')
            ->count();
            
            $dir062023 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir06')
            ->where(DB::raw('year(data_pelanggarans.tanggal)'), '=', '2023')
            ->count();

            $dir23 = array(
                $dir012023,
                $dir022023,
                $dir032023,
                $dir062023,
                $dir042023,
                $dir052023
            );

            $dir1janfeb = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir01')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '1')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '2');
            })
            ->count();

            $dir1marapr = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir01')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '3')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '4');
            })
            ->count();

            $dir1meijun = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir01')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '5')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '6');
            })
            ->count();

            $dir1julagus = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir01')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '7')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '8');
            })
            ->count();

            $dir1sepok = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir01')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '9')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '10');
            })
            ->count();

            $dir1novdes = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir01')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '11')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '12');
            })
            ->count();
            
            
            $dir1 = array(
                $dir1janfeb,
                $dir1marapr,
                $dir1meijun,
                $dir1julagus,
                $dir1sepok,
                $dir1novdes
            );

            $dir2janfeb = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir02')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '1')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '2');
            })
            ->count();

            $dir2marapr = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir02')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '3')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '4');
            })
            ->count();

            $dir2meijun = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir02')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '5')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '6');
            })
            ->count();

            $dir2julagus = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir02')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '7')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '8');
            })
            ->count();

            $dir2sepok = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir02')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '9')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '10');
            })
            ->count();

            $dir2novdes = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir02')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '11')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '12');
            })
            ->count();
            
            
            $dir2 = array(
                $dir2janfeb,
                $dir2marapr,
                $dir2meijun,
                $dir2julagus,
                $dir2sepok,
                $dir2novdes
            );

            $dir3janfeb = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir03')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '1')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '2');
            })
            ->count();

            $dir3marapr = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir03')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '3')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '4');
            })
            ->count();

            $dir3meijun = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir03')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '5')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '6');
            })
            ->count();

            $dir3julagus = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir03')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '7')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '8');
            })
            ->count();

            $dir3sepok = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir03')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '9')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '10');
            })
            ->count();

            $dir3novdes = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir03')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '11')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '12');
            })
            ->count();
            
            
            $dir3 = array(
                $dir3janfeb,
                $dir3marapr,
                $dir3meijun,
                $dir3julagus,
                $dir3sepok,
                $dir3novdes
            );

            $dir4janfeb = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir04')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '1')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '2');
            })
            ->count();

            $dir4marapr = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir04')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '3')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '4');
            })
            ->count();

            $dir4meijun = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir04')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '5')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '6');
            })
            ->count();

            $dir4julagus = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir04')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '7')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '8');
            })
            ->count();

            $dir4sepok = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir04')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '9')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '10');
            })
            ->count();

            $dir4novdes = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir04')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '11')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '12');
            })
            ->count();
            
            
            $dir4 = array(
                $dir4janfeb,
                $dir4marapr,
                $dir4meijun,
                $dir4julagus,
                $dir4sepok,
                $dir4novdes
            );

            $dir5janfeb = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir05')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '1')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '2');
            })
            ->count();

            $dir5marapr = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir05')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '3')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '4');
            })
            ->count();

            $dir5meijun = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir05')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '5')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '6');
            })
            ->count();

            $dir5julagus = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir05')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '7')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '8');
            })
            ->count();

            $dir5sepok = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir05')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '9')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '10');
            })
            ->count();

            $dir5novdes = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir05')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '11')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '12');
            })
            ->count();
            
            
            $dir5 = array(
                $dir5janfeb,
                $dir5marapr,
                $dir5meijun,
                $dir5julagus,
                $dir5sepok,
                $dir5novdes
            );


            $dir6janfeb = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir06')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '1')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '2');
            })
            ->count();

            $dir6marapr = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir06')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '3')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '4');
            })
            ->count();

            $dir6meijun = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir06')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '5')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '6');
            })
            ->count();

            $dir6julagus = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir06')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '7')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '8');
            })
            ->count();

            $dir6sepok = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir06')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '9')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '10');
            })
            ->count();

            $dir6novdes = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('direktoris', 'direktoris.kode_direktori', '=', 'data_pelanggarans.kode_direktori_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('direktoris.kode_direktori', '=', 'dir06')
            ->where(function($query) {
                $query->where(DB::raw('month(data_pelanggarans.tanggal)'), '=', '11')
                      ->orWhere(DB::raw('month(data_pelanggarans.tanggal)'), '=', '12');
            })
            ->count();
            
            
            $dir6 = array(
                $dir6janfeb,
                $dir6marapr,
                $dir6meijun,
                $dir6julagus,
                $dir6sepok,
                $dir6novdes
            );


        return view('admin.dashboard', compact('pelanggarandir','dir22', 'dir21', 'dir23', 'dir1', 'dir2', 'dir3', 'dir4', 'dir5', 'dir6' ), [
            "title" => "Dashboard"
        ]);
    }

    public function profil()
    {
        
        $datas_desa = DB::table('desas')
        ->join('kecamatans', 'desas.kode_kec_id', '=', 'kecamatans.kode_kec')
        ->join('kabupatens', 'kecamatans.kode_kab_id', '=', 'kabupatens.kode_kab')
        ->where('kabupatens.kode_kab', '=', auth()->user()->kode_kab_id)
        ->select('desas.*', 'kecamatans.nama_kec')
        ->get();
 
        
        $kabupaten = DB::table('users')
        ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
        ->select('kabupatens.nama_kab')
        ->where('users.id', '=', auth()->user()->id)
        ->first();

        $kecamatans =  DB::table('kecamatans')
        ->join('kabupatens', 'kecamatans.kode_kab_id', '=', 'kabupatens.kode_kab')
        ->select('kecamatans.*', 'kabupatens.nama_kab')
        ->get(); 

        $userKodeKab = Auth::user()->kode_kab_id; // ambil kode kabupaten dari user yang login
        $jumlahKecamatan = DB::table('kecamatans')
        ->join('kabupatens', 'kecamatans.kode_kab_id', '=', 'kabupatens.kode_kab')
        ->select('kecamatans.*', 'kabupatens.nama_kab')
        ->where('kabupatens.kode_kab', '=', $userKodeKab)
        ->count();

        $jumlah_desa = DB::table('desas')
        ->join('kecamatans', 'desas.kode_kec_id', '=', 'kecamatans.kode_kec')
        ->join('kabupatens', 'kecamatans.kode_kab_id', '=', 'kabupatens.kode_kab')
        ->where('kabupatens.kode_kab', '=', auth()->user()->kode_kab_id)
        ->count();

        $jumlah_pelanggaran = DB::table('data_pelanggarans')->where('user_id', auth()->user()->id)->count();
        

        $jumlah_klasifikasi = DB::table('klasifikasis')
        ->join('jenis_pengadilans', 'klasifikasis.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
        ->where('jenis_pengadilans.kode_jenis', '=', auth()->user()->kode_jenis_id)
        ->count();


        return view('admin.profile', compact('kabupaten', 'kecamatans','datas_desa', 'jumlahKecamatan', 'jumlah_desa', 'jumlah_pelanggaran', 'jumlah_klasifikasi'), [
            "title" => "Profile Pengadilan"
        ]);
    }

    public function detail()
    {
        return view('admin.detail', [
            "title" => "Detail Data"
        ]);
    }
    public function data_pelanggaran()
    {
        return view('admin.data_pelanggaran', [
            "title" => "data_pelanggaran"
        ]);
    }

    public function getDirektoris()
    {
        $direktoris = Direktori::get();
        $klasifikasi = Klasifikasi::get();
        return view('admin.baru', [
            'title' => "add-item-pelanggaran",
            'direktoris' => $direktoris,
            'klasifikasi' => $klasifikasi,
        ]);
    }

    public function getKlasifikasi($kode_direktori_id, $kode_jenis_id)
    {
        $klasifikasi = Klasifikasi::where('kode_direktori_id', $kode_direktori_id)->where('kode_jenis_id', $kode_jenis_id)->get();
        return response()->json($klasifikasi);

        // @dd($klasifikasi);
    }

    public function getKecamatans()
    {
        $kecamatans = Kecamatan::get();
        $desa = Desa::get();
        return view('admin.baru', [
            'title' => "add-item-pelanggaran",
            'kecamatans' => $kecamatans,
            'desas' => $desa, // perbaiki variabel desa menjadi desas
        ]);
    }
    

    public function getDesa($kode_kec_id)
    {
        $desa = Desa::where('kode_kec_id', $kode_kec_id)->get();
        return response()->json($desa);

        // @dd($klasifikasi);
    }


    
}
