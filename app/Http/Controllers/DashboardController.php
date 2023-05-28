<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kabupaten;

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
        // dd($titikdir);
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
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $pa2021 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpa')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $pm2021 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehpm')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $ptun2021 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('jenis_pengadilans', 'users.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->where('jenis_pengadilans.kode_jenis', '=', 'acehptun')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
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

            $banda22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acban1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbar22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbdy22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbdy1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbes22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbes1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbir22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbir1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbme22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbme1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acgar22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acgay22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acjay22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acjay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $aclan22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclan1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $aclho22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclho1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acngn22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acngn1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acpid22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acpid1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsab22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsab1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsbs22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsbs1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsel22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsel1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsig22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsig1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acsim22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acsin22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsin1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $actam22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actam1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acten22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acten1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $actim22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acuta22 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acuta1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $kabupaten0122 = array(
                $banda22,
                $acbar22,
                $acbdy22,
                $acbes22,
                $acbir22,
                $acbme22,
                $acgar22,
                $acgay22,
                $acjay22,
                $aclan22,
                $aclho22,
                $acngn22,
                $acpid22,
                $acsab22,
                $acsbs22,
                $acsel22,
                $acsig22,
                $acsim22,
                $acsin22,
                $actam22,
                $acten22,
                $actim22,
                $acuta22


            );


            $banda23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acban1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbar23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbdy23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbdy1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbes23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbes1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbir23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbir1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbme23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbme1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acgar23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acgay23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acjay23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acjay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $aclan23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclan1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $aclho23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclho1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acngn23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acngn1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acpid23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acpid1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsab23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsab1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsbs23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsbs1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsel23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsel1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsig23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsig1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acsim23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acsin23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsin1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $actam23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actam1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acten23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acten1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $actim23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acuta23 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acuta1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir01')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $kabupaten0123 = array(
                $banda23,
                $acbar23,
                $acbdy23,
                $acbes23,
                $acbir23,
                $acbme23,
                $acgar23,
                $acgay23,
                $acjay23,
                $aclan23,
                $aclho23,
                $acngn23,
                $acpid23,
                $acsab23,
                $acsbs23,
                $acsel23,
                $acsig23,
                $acsim23,
                $acsin23,
                $actam23,
                $acten23,
                $actim23,
                $acuta23


            );

            $banda0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acban1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbar0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbdy0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbdy1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbes0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbes1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbir0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbir1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbme0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbme1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acgar0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acgay0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acjay0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acjay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $aclan0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclan1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $aclho0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclho1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acngn0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acngn1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acpid0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acpid1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsab0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsab1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsbs0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsbs1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsel0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsel1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsig0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsig1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acsim0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acsin0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsin1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $actam0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actam1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acten0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acten1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $actim0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acuta0222 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acuta1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $kabupaten0222 = array(
                $banda0222,
                $acbar0222,
                $acbdy0222,
                $acbes0222,
                $acbir0222,
                $acbme0222,
                $acgar0222,
                $acgay0222,
                $acjay0222,
                $aclan0222,
                $aclho0222,
                $acngn0222,
                $acpid0222,
                $acsab0222,
                $acsbs0222,
                $acsel0222,
                $acsig0222,
                $acsim0222,
                $acsin0222,
                $actam0222,
                $acten0222,
                $actim0222,
                $acuta0222


            );

            
            $banda0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acban1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbar0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbdy0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbdy1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbes0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbes1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbir0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbir1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbme0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbme1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acgar0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acgay0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acjay0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acjay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $aclan0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclan1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $aclho0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclho1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acngn0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acngn1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acpid0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acpid1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsab0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsab1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsbs0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsbs1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsel0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsel1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsig0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsig1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acsim0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acsin0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsin1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $actam0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actam1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acten0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acten1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $actim0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acuta0223 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acuta1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir02')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $kabupaten0223 = array(
                $banda0223,
                $acbar0223,
                $acbdy0223,
                $acbes0223,
                $acbir0223,
                $acbme0223,
                $acgar0223,
                $acgay0223,
                $acjay0223,
                $aclan0223,
                $aclho0223,
                $acngn0223,
                $acpid0223,
                $acsab0223,
                $acsbs0223,
                $acsel0223,
                $acsig0223,
                $acsim0223,
                $acsin0223,
                $actam0223,
                $acten0223,
                $actim0223,
                $acuta0223


            );

            
            $banda0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acban1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbar0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbdy0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbdy1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbes0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbes1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbir0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbir1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbme0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbme1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acgar0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acgay0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acjay0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acjay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $aclan0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclan1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $aclho0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclho1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acngn0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acngn1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acpid0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acpid1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsab0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsab1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsbs0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsbs1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsel0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsel1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsig0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsig1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acsim0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acsin0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsin1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $actam0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actam1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acten0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acten1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $actim0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acuta0322 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acuta1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $kabupaten0322 = array(
                $banda0322,
                $acbar0322,
                $acbdy0322,
                $acbes0322,
                $acbir0322,
                $acbme0322,
                $acgar0322,
                $acgay0322,
                $acjay0322,
                $aclan0322,
                $aclho0322,
                $acngn0322,
                $acpid0322,
                $acsab0322,
                $acsbs0322,
                $acsel0322,
                $acsig0322,
                $acsim0322,
                $acsin0322,
                $actam0322,
                $acten0322,
                $actim0322,
                $acuta0322


            );

            
            $banda0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acban1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbar0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbdy0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbdy1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbes0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbes1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbir0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbir1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbme0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbme1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acgar0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acgay0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acjay0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acjay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $aclan0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclan1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $aclho0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclho1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acngn0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acngn1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acpid0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acpid1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsab0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsab1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsbs0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsbs1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsel0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsel1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsig0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsig1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acsim0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acsin0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsin1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $actam0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actam1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acten0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acten1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $actim0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acuta0323 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acuta1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir03')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $kabupaten0323 = array(
                $banda0323,
                $acbar0323,
                $acbdy0323,
                $acbes0323,
                $acbir0323,
                $acbme0323,
                $acgar0323,
                $acgay0323,
                $acjay0323,
                $aclan0323,
                $aclho0323,
                $acngn0323,
                $acpid0323,
                $acsab0323,
                $acsbs0323,
                $acsel0323,
                $acsig0323,
                $acsim0323,
                $acsin0323,
                $actam0323,
                $acten0323,
                $actim0323,
                $acuta0323


            );


                        
            $banda0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acban1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbar0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbdy0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbdy1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbes0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbes1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbir0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbir1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbme0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbme1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acgar0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acgay0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acjay0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acjay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $aclan0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclan1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $aclho0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclho1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acngn0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acngn1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acpid0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acpid1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsab0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsab1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsbs0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsbs1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsel0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsel1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsig0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsig1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acsim0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acsin0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsin1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $actam0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actam1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acten0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acten1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $actim0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acuta0422 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acuta1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $kabupaten0422 = array(
                $banda0422,
                $acbar0422,
                $acbdy0422,
                $acbes0422,
                $acbir0422,
                $acbme0422,
                $acgar0422,
                $acgay0422,
                $acjay0422,
                $aclan0422,
                $aclho0422,
                $acngn0422,
                $acpid0422,
                $acsab0422,
                $acsbs0422,
                $acsel0422,
                $acsig0422,
                $acsim0422,
                $acsin0422,
                $actam0422,
                $acten0422,
                $actim0422,
                $acuta0422


            );

            
            $banda0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acban1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbar0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbdy0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbdy1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbes0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbes1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbir0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbir1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbme0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbme1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acgar0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acgay0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acjay0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acjay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $aclan0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclan1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $aclho0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclho1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acngn0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acngn1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acpid0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acpid1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsab0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsab1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsbs0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsbs1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsel0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsel1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsig0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsig1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acsim0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acsin0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsin1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $actam0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actam1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acten0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acten1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $actim0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acuta0423 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acuta1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir04')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $kabupaten0423 = array(
                $banda0423,
                $acbar0423,
                $acbdy0423,
                $acbes0423,
                $acbir0423,
                $acbme0423,
                $acgar0423,
                $acgay0423,
                $acjay0423,
                $aclan0423,
                $aclho0423,
                $acngn0423,
                $acpid0423,
                $acsab0423,
                $acsbs0423,
                $acsel0423,
                $acsig0423,
                $acsim0423,
                $acsin0423,
                $actam0423,
                $acten0423,
                $actim0423,
                $acuta0423


            );

                        
            $banda0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acban1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbar0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbdy0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbdy1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbes0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbes1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbir0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbir1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbme0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbme1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acgar0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acgay0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acjay0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acjay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $aclan0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclan1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $aclho0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclho1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acngn0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acngn1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acpid0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acpid1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsab0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsab1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsbs0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsbs1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsel0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsel1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsig0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsig1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acsim0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acsin0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsin1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $actam0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actam1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acten0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acten1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $actim0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acuta0522 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acuta1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $kabupaten0522 = array(
                $banda0522,
                $acbar0522,
                $acbdy0522,
                $acbes0522,
                $acbir0522,
                $acbme0522,
                $acgar0522,
                $acgay0522,
                $acjay0522,
                $aclan0522,
                $aclho0522,
                $acngn0522,
                $acpid0522,
                $acsab0522,
                $acsbs0522,
                $acsel0522,
                $acsig0522,
                $acsim0522,
                $acsin0522,
                $actam0522,
                $acten0522,
                $actim0522,
                $acuta0522


            );

            
            $banda0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acban1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbar0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbdy0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbdy1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbes0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbes1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbir0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbir1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbme0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbme1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acgar0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acgay0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acjay0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acjay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $aclan0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclan1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $aclho0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclho1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acngn0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acngn1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acpid0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acpid1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsab0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsab1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsbs0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsbs1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsel0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsel1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsig0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsig1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acsim0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acsin0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsin1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $actam0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actam1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acten0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acten1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $actim0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acuta0523 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acuta1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir05')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $kabupaten0523 = array(
                $banda0523,
                $acbar0523,
                $acbdy0523,
                $acbes0523,
                $acbir0523,
                $acbme0523,
                $acgar0523,
                $acgay0523,
                $acjay0523,
                $aclan0523,
                $aclho0523,
                $acngn0523,
                $acpid0523,
                $acsab0523,
                $acsbs0523,
                $acsel0523,
                $acsig0523,
                $acsim0523,
                $acsin0523,
                $actam0523,
                $acten0523,
                $actim0523,
                $acuta0523


            );

                        
            $banda0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acban1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbar0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbdy0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbdy1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbes0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbes1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbir0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbir1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acbme0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbme1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acgar0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acgay0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acjay0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acjay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $aclan0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclan1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $aclho0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclho1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acngn0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acngn1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acpid0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acpid1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsab0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsab1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsbs0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsbs1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsel0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsel1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acsig0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsig1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acsim0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acsin0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsin1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $actam0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actam1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $acten0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acten1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $actim0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();

            $acuta0622 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acuta1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2022)
            ->count();


            $kabupaten0622 = array(
                $banda0622,
                $acbar0622,
                $acbdy0622,
                $acbes0622,
                $acbir0622,
                $acbme0622,
                $acgar0622,
                $acgay0622,
                $acjay0622,
                $aclan0622,
                $aclho0622,
                $acngn0622,
                $acpid0622,
                $acsab0622,
                $acsbs0622,
                $acsel0622,
                $acsig0622,
                $acsim0622,
                $acsin0622,
                $actam0622,
                $acten0622,
                $actim0622,
                $acuta0622


            );

            
            $banda0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acban1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbar0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbdy0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbdy1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbes0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbes1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbir0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbir1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acbme0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acbme1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acgar0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgar1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acgay0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acgay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acjay0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acjay1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $aclan0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclan1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $aclho0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'aclho1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acngn0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acngn1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acpid0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acpid1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsab0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsab1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsbs0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsbs1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsel0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsel1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acsig0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsig1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acsim0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acsin0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acsin1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $actam0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actam1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $acten0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acten1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $actim0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'actim1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();

            $acuta0623 = DB::table('data_pelanggarans')
            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
            ->join('kabupatens', 'users.kode_kab_id', '=', 'kabupatens.kode_kab')
            ->where('kabupatens.kode_kab', '=', 'acuta1')
            ->where('data_pelanggarans.kode_direktori_id', '=', 'dir06')
            ->whereYear('data_pelanggarans.tanggal', '=', 2023)
            ->count();


            $kabupaten0623 = array(
                $banda0623,
                $acbar0623,
                $acbdy0623,
                $acbes0623,
                $acbir0623,
                $acbme0623,
                $acgar0623,
                $acgay0623,
                $acjay0623,
                $aclan0623,
                $aclho0623,
                $acngn0623,
                $acpid0623,
                $acsab0623,
                $acsbs0623,
                $acsel0623,
                $acsig0623,
                $acsim0623,
                $acsin0623,
                $actam0623,
                $acten0623,
                $actim0623,
                $acuta0623


            );
            
            
            // $dir02 = DB::table('klasifikasis')
            // ->join('direktoris', 'klasifikasis.kode_direktori_id', '=', 'direktoris.kode_direktori')
            // ->where('direktoris.kode_direktori', 'dir01')
            // ->select('klasifikasis.nama_klasifikasi')
            // ->get();

            $dir = DB::table('klasifikasis')
            ->get();
            $dirJson = json_encode($dir);

            $kabupatengrafik = Kabupaten::pluck('nama_kab')->toArray();
            
        return view('umum/dashboard', 
        compact('kabupaten0623','kabupaten0622','kabupaten0523','kabupaten0522','kabupaten0423','kabupaten0422','kabupaten0323','kabupaten0322','kabupaten0223', 'kabupaten0222','kabupaten0123','kabupaten0122', 'dirJson','geojson_kabupaten', 'kabupatengrafik','dir','data_pelanggaran', 'data22', 'data21', 'data23','geojson_kecamatan', 'geojson_desa', 'klasifikasis', 'nama_kabupaten','pelanggarans','titik', 'desas', 'titikdir', 'total_pelanggaran'));
        
    }
    
    
}