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
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Kecamatan;



class KecamatanController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas_kecamatan = DB::table('kecamatans')
                        ->join('kabupatens', 'kecamatans.kode_kab_id', '=', 'kabupatens.kode_kab')
                        ->select('kecamatans.*', 'kabupatens.nama_kab')
                        ->get();
        $kabupatens = kabupaten::get();
        // return view 
        return view('admin.add_kecamatan', [
            'title' => 'Tambah kecamatan',
            'datas_kecamatan' => $datas_kecamatan,
            'kabupatens' => $kabupatens
        ]);
    }

    public function create(Request $request)
    {
        $kabupatens = Kabupaten::get();
        $users = auth()->user();

            
        return view('admin.add_kecamatan', compact('users'), [
            "title" => "Tambah kecamatan",
            'kabupatens' => $kabupatens
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorekecamatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_kecamatan' => 'required',
            'nama_kecamatan' => 'required',
            'kode_kabupaten' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $kecamatanData = [
            'kode_kab_id' => $request->kode_kabupaten,
            'kode_kec' => $request->kode_kecamatan,
            'nama_kec' => $request->nama_kecamatan,
            'geojson_kec' => $request->geojson_kec
        ];
    
        DB::table('kecamatans')->insert($kecamatanData);
    
        return redirect('kecamatan')->with('success', 'Data Berhasil Ditambah.');
    }

    public function edit($kode_kec)
    {
        $kecamatan = Kecamatan::with('kabupatens')->find($kode_kec);   
        $kabupatens = kabupaten::all();                      

        return view('admin.edit_kecamatan', compact('kecamatan', 'kabupatens'), [
            'title' => 'Edit Kecamatan',
            'kode_kec' => $kode_kec // Menambahkan kode kec pada view
        ]);
    }
    

    public function update(Request $request, $kode_kec)
    {
        // dd($request->kode_kec);
        $kode_kec = $request->input('kode_kec');
        DB::table('kecamatans')
            ->where('kode_kec', $kode_kec)
            ->update([
                'nama_kec' => $request->input('nama_kecamatan')
            ]);

        return redirect('kecamatan')->with('success', 'Data Berhasil Diupdate.');

    }

    public function destroy(Kecamatan $kode_kec)
    {
        Klasifikasi::destroy($kode_kec);


        return redirect('kecamatan');
    }

    public function getGeoJSONByKodeKec($kode_kec) {
    
    
        // Bangun path ke file GeoJSON kecamatan
        $path = public_path("batas-kecamatan/bandaaceh/baiturrahma.geojson");
    
        // Baca file GeoJSON kecamatan
        $geojson = json_decode(file_get_contents($path));
    
        // Set header response menjadi JSON
        header('Content-Type: application/json');
    
        // Kembalikan data GeoJSON dalam format JSON
        return json_encode($geojson);
    }
    
    
}
