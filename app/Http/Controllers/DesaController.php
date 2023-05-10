<?php

namespace App\Http\Controllers;
use App\Models\DataPelanggaran;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDataPelanggaranRequest;
use App\Http\Requests\UpdateDataPelanggaranRequest;
use App\Models\Direktori;
use App\Models\Klasifikasi;
use App\Models\Kabupaten;
use Illuminate\Support\Facades\DB;
use App\Models\Desa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Kecamatan;

class DesaController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas_desa = DB::table('desas')
        ->join('kecamatans', 'desas.kode_kec_id', '=', 'kecamatans.kode_kec')
        ->join('kabupatens', 'kecamatans.kode_kab_id', '=', 'kabupatens.kode_kab')
        ->where('kabupatens.kode_kab', '=', auth()->user()->kode_kab_id)
        ->select('desas.*', 'kecamatans.nama_kec')
        ->get();
 
        $kecamatans =  DB::table('kecamatans')
        ->join('kabupatens', 'kecamatans.kode_kab_id', '=', 'kabupatens.kode_kab')
        ->select('kecamatans.*', 'kabupatens.nama_kab')
        ->get();                      
        
        // return view 
        return view('admin.add_desa', [
            'title' => 'Tambah desa',
            'datas_desa' => $datas_desa,
            'kecamatans' => $kecamatans
        ]);
    }

    public function create(Request $request)
    {
        $kecamatans = Kecamatan::get();
        $users = auth()->user();
        

            
        return view('admin.add_desa', compact('users'), [
            "title" => "Tambah desa",
            'kecamatans' => $kecamatans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredesaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'kode_desa' => 'required',
            'nama_desa' => 'required',
            'kode_kecamatan' => 'required'
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $desa = new Desa;
        $desa->kode_kec_id = $request->kode_kecamatan;
        $desa->kode_des = $request->kode_desa;
        $desa->nama_des = $request->nama_desa;
        $desa->geojson_des = $request->geojson_des;
        $desa->save();
        // dd($desa);
    
        return redirect()->back()->withSuccess('desa berhasil ditambahkan');
    }

    public function edit($kode_des)
    {
        $desa = Desa::findOrFail($kode_des);
        $datas_desa = DB::table('desas')
        ->join('kecamatans', 'desas.kode_kec_id', '=', 'kecamatans.kode_kec')
        ->join('kabupatens', 'kecamatans.kode_kab_id', '=', 'kabupatens.kode_kab')
        ->where('kabupatens.kode_kab', '=', auth()->user()->kode_kab_id)
        ->where('desas.kode_des', '=', $kode_des)
        ->select('desas.*', 'kecamatans.nama_kec')
        ->get();
    
    
        $kecamatans =  DB::table('kecamatans')
        ->join('kabupatens', 'kecamatans.kode_kab_id', '=', 'kabupatens.kode_kab')
        ->select('kecamatans.*', 'kabupatens.nama_kab')
        ->get();                      
    
        // return view 
        return view('admin.edit_desa', compact('datas_desa', 'kecamatans', 'desa'), [
            'title' => 'Edit desa',
            'kode_des' => $kode_des // Menambahkan kode desa pada view
        ]);
    }
    
    public function update(Request $request, $kode_des)
    {
        $desa = Desa::findOrFail($kode_des);
        // dd($desa); // tambahkan ini
        $desa->kode_des = $request->input('kode_desa');
        $desa->kode_kec_id = $request->input('kode_kecamatan');
        $desa->nama_des = $request->input('nama_desa');
        $desa->save();
        return redirect()->route('admin.add_desa')->with('success', 'Data Berhasil Diupdate.');
    }
    

    public function destroy(Desa $kode_desa)
    {
        // 
        Desa::destroy($kode_desa);
    
        return redirect('admin.add_desa');
    }
    

    
    public function getGeoJSONByKodeDes($kode_des) {
        // Ambil data desa berdasarkan kode desa
        $desa = Desa::where('kode_des', $kode_des)->first();
    
        // Buat array data GeoJSON
        $geojson = [
            'type' => 'Feature',
            'geometry' => json_decode($desa->geojson),
            'properties' => [
                'nama_des' => $desa->nama_des,
                'kode_des' => $desa->kode_des,
            ],
        ];
    
        // Set header response menjadi JSON
        header('Content-Type: application/json');
    
        // Kembalikan data GeoJSON dalam format JSON
        return json_encode($geojson);
    }

}
