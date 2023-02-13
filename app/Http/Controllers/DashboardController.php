<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $geojson_kabupaten = DB::table("kabupatens")->get();
        $titik = User::all();
        $pelanggarans = DB::table("data_pelanggarans")->selectRaw('user_id, count(*) as jumlah')
        ->groupBy('user_id')
        ->get();
       // dd($titik);
        return view('umum/dashboard', compact('geojson_kabupaten','pelanggarans','titik'));
    }
    
}