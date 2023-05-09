<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Desa;

class DashboardController extends Controller
{
    public function index()
    {
        $geojson_kabupaten = DB::table("kabupatens")->get();
        $geojson_kecamatan = DB::table("kecamatans")->get();
        $geojson_desa = DB::table("desas")->get();
        $nama_kabupaten = DB::table("kabupatens")->get();
        $klasifikasis = DB::table("klasifikasis")->get();
        $titikdir = DB::table("data_pelanggarans")->get();
        $titik = DB::table("users")->get();
        $desas = Desa::get();
        // dd($geojson_desa->keys(), $geojson_desa);
        $total_pelanggaran = DB::table("data_pelanggarans")->count(); // hitung total pelanggaran
        $pelanggarans = DB::table("data_pelanggarans")->selectRaw('user_id, count(*) as jumlah')
        ->groupBy('user_id')
        ->get();

            $jumlah_pelanggaranpu = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpu') // mengubah filter berdasarkan nama jenis_pengadilan
            ->count();

            $jumlah_pelanggaranms = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpa') // mengubah filter berdasarkan nama jenis_pengadilan
            ->count();

            $jumlah_pelanggaranpm = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpm') // mengubah filter berdasarkan nama jenis_pengadilan
            ->count();

            $jumlah_pelanggaranptun = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehptun') // mengubah filter berdasarkan nama jenis_pengadilan
            ->count();

            
            $pu2021 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpu')
            ->whereYear('data_pelanggarans.tanggal', '=', 2021)
            ->count();

            $pa2021 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpa')
            ->whereYear('data_pelanggarans.tanggal', '=', 2021)
            ->count();

            $pm2021 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpm')
            ->whereYear('data_pelanggarans.tanggal', '=', 2021)
            ->count();

            $ptun2021 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehptun')
            ->whereYear('data_pelanggarans.tanggal', '=', 2021)
            ->count();

            $pu2022 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpu')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $pa2022 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpa')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $pm2022 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpm')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $ptun2022 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehptun')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $pu2023 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpu')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $pa2023 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpa')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $pm2023 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpm')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $ptun2023 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehptun')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $data_pelanggaran = array(
                $jumlah_pelanggaranpu,
                $jumlah_pelanggaranms,
                $jumlah_pelanggaranpm,
                $jumlah_pelanggaranptun
            );

            $data21 = array(
                $pu2021,
                $pa2021,
                $pm2021,
                $ptun2021
            );

            $data22 = array(
                $pu2022,
                $pa2022,
                $pm2022,
                $ptun2022
            );

            $data23 = array(
                $pu2023,
                $pa2023,
                $pm2023,
                $ptun2023
            );
        
        return view('umum/dashboard', 
        compact('geojson_kabupaten','data_pelanggaran', 'data22', 'data21', 'data23','geojson_kecamatan', 'geojson_desa', 'klasifikasis', 'nama_kabupaten','pelanggarans','titik', 'desas', 'titikdir', 'total_pelanggaran'));
        
    }
    
    
}