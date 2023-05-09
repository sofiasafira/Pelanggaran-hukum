<?php

namespace App\Http\Controllers;
use App\Models\DataPelanggaran;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDataPelanggaranRequest;
use App\Http\Requests\UpdateDataPelanggaranRequest;
use App\Models\Direktori;
use App\Models\Klasifikasi;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas_klasifikasi = DB::table('klasifikasis')
                        ->join('direktoris', 'klasifikasis.kode_direktori_id', '=', 'direktoris.kode_direktori')
                        ->select('klasifikasis.*', 'direktoris.nama_direktori')
                        ->get();
        $users = auth()->user();
        $direktoris = Direktori::get();
        // return view 
        return view('admin.add_klasifikasi', compact( 'users'), [
            'title' => 'Tambah Klasifikasi',
            'datas_klasifikasi' => $datas_klasifikasi,
            'direktoris' => $direktoris
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $direktoris = Direktori::get();

            
        return view('admin.add_klasifikasi', [
            "title" => "Tambah Klasifikasi",
            'direktoris' => $direktoris
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKlasifikasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'kode_klasifikasi' => 'required',
            'nama_klasifikasi' => 'required',
            'kode_direktori' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $klasifikasi = new Klasifikasi;
        $klasifikasi->kode_klasifikasi = $request->kode_klasifikasi;
        $klasifikasi->nama_klasifikasi = $request->nama_klasifikasi;
        $klasifikasi->kode_jenis_id = auth()->user()->kode_jenis_id;
        $klasifikasi->kode_direktori_id = $request->kode_direktori;
        $klasifikasi->save();
    
        return redirect()->back()->withSuccess('Klasifikasi berhasil ditambahkan');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_klasifikasi)
    {
        $klasifikasi = \App\Models\Klasifikasi::where('kode_klasifikasi', $kode_klasifikasi)->first();
        $direktoris = Direktori::all();
        $users = auth()->user();
        $datas_klasifikasi = DB::table('klasifikasis')
            ->join('direktoris', 'klasifikasis.kode_direktori_id', '=', 'direktoris.kode_direktori')
            ->join('jenis_pengadilans', 'klasifikasis.kode_jenis_id', '=', 'jenis_pengadilans.kode_jenis')
            ->select('klasifikasis.*', 'direktoris.nama_direktori', 'jenis_pengadilans.jenis_pengadilan')
            ->where('klasifikasis.kode_klasifikasi', '=', $kode_klasifikasi)
            ->first();
    
        return view('admin.edit_klasifikasi', compact('klasifikasi', 'datas_klasifikasi', 'direktoris','users'),[
            "title" => "Edit Klasifikasi",
            'kode_klasifikasi' => $kode_klasifikasi
        ]);
    }
    
    public function update(Request $request, $kode_klasifikasi)
    {
        $validatedData = $request->validate([
            'kode_klasifikasi' => 'required|unique:klasifikasis,kode_klasifikasi,'.$kode_klasifikasi,
            'nama_klasifikasi' => 'required',
            'kode_direktori' => 'required',
            'kode_jenis_id' => 'required',
        ]);
    
        $klasifikasi = Klasifikasi::where('kode_klasifikasi', $kode_klasifikasi)->firstOrFail();
        $klasifikasi->kode_klasifikasi = $validatedData['kode_klasifikasi'];
        $klasifikasi->nama_klasifikasi = $validatedData['nama_klasifikasi'];
        $klasifikasi->kode_direktori = $validatedData['kode_direktori'];
        $klasifikasi->kode_jenis_id = $validatedData['kode_jenis_id'];
        $klasifikasi->save();
        
    
        return redirect('/klasifikasi')->with('success', 'Data klasifikasi berhasil diubah.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klasifikasi  $dataklasifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klasifikasi $kode_klasifikasi)
    {
        //
        Klasifikasi::destroy($kode_klasifikasi);
        return redirect('klasifikasi');
    }
}
