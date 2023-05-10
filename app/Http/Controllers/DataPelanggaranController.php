<?php

namespace App\Http\Controllers;
use App\Models\DataPelanggaran;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDataPelanggaranRequest;
use App\Http\Requests\UpdateDataPelanggaranRequest;
use App\Models\Direktori;
use App\Models\Klasifikasi;
use App\Models\Kecamatan;
use App\Models\Desa;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;


class DataPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas_pelanggaran = DB::table('data_pelanggarans')
        ->join('desas', 'data_pelanggarans.kode_des_id', '=', 'desas.kode_des')
        ->join('kecamatans', 'desas.kode_kec_id', '=', 'kecamatans.kode_kec')
        ->join('direktoris', 'data_pelanggarans.kode_direktori_id', '=', 'direktoris.kode_direktori')
        ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'klasifikasis.kode_klasifikasi')
        ->select('data_pelanggarans.*', 'direktoris.nama_direktori', 'klasifikasis.nama_klasifikasi','desas.nama_des', 'kecamatans.nama_kec')
        ->get();
    

        $kecamatans =  DB::table('kecamatans')
        ->join('kabupatens', 'kecamatans.kode_kab_id', '=', 'kabupatens.kode_kab')
        ->select('kecamatans.*', 'kabupatens.nama_kab')
        ->get(); 

        // return view 
        return view('admin.add_data',  compact('kecamatans', 'datas_pelanggaran'), [
            'title' => 'Table Data'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDataPelanggaranRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'kode_direktori' => 'required',
            'kode_klasifikasi' => 'required',
            'deskripsi' => 'required',
            'pemohon' => 'required',
            'tersangka' => 'required',
            'kecamatan' => 'required',
            'kode_des' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::table('data_pelanggarans')->insert([
            'kode_pelanggaran' => $request->kode_pelanggaran,
            'tanggal' => $request->tanggal,
            'kode_direktori_id' => $request->kode_direktori,
            'kode_klasifikasi_id' => $request->kode_klasifikasi,
            'user_id' => $request->user_id,
            'kode_des_id' => $request->kode_des,
            'deskripsi' => $request->deskripsi,
            'pemohon' => $request->pemohon,
            'tersangka' => $request->tersangka,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return redirect('admin')->withSuccess('Data Berhasil Ditambah');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPelanggaran  $dataPelanggaran
     * @return \Illuminate\Http\Response
     */
    public function show($kode_pelanggaran)
    {
        $data_pelanggaran = DataPelanggaran::where('kode_pelanggaran', $kode_pelanggaran)->firstOrFail();
        // tambahkan query untuk mengambil data direktori, desa dan klasifikasi
        $direktori = Direktori::where('kode_direktori', $data_pelanggaran->kode_direktori_id)->first();
        $desa = Desa::where('kode_des', $data_pelanggaran->kode_des_id)->first();
        $kecamatan = Kecamatan::where('kode_kec', $desa->kode_kec_id)->first();
        $klasifikasi = Klasifikasi::where('kode_klasifikasi', $data_pelanggaran->kode_klasifikasi_id)->first();
        return view('admin.show', compact('data_pelanggaran', 'direktori', 'klasifikasi', 'desa', 'kecamatan'), [
            "title" => "Show Data"
        ]);
    }
    
    public function delete($kode_pelanggaran)
    {
        // Retrieve the data pelanggaran that matches the provided kode_pelanggaran
        $data_pelanggaran = DataPelanggaran::find($kode_pelanggaran);

        // Delete the data pelanggaran from the database
        $data_pelanggaran->delete();

        // Redirect the user back to the admin page with a success message
        return redirect()->route('admin.index')->with('success', 'Data Berhasil Dihapus.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataPelanggaranRequest  $request
     * @param  \App\Models\DataPelanggaran  $dataPelanggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_pelanggaran)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'kode_direktori' => 'required',
            'kode_klasifikasi' => 'required',
            'deskripsi' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $data_pelanggaran = DataPelanggaran::findOrFail($kode_pelanggaran);
    
        $data_pelanggaran->tanggal = $request->input('tanggal');
        $data_pelanggaran->kode_direktori_id = $request->input('kode_direktori');
        $data_pelanggaran->kode_klasifikasi_id = $request->input('kode_klasifikasi');
        $data_pelanggaran->deskripsi = $request->input('deskripsi');
    
        $data_pelanggaran->save();
    
        return redirect()->route('admin.index')->with('success', 'Data Berhasil Diupdate.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPelanggaran  $dataPelanggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPelanggaran $kode_pelanggaran)
    {
        DataPelanggaran::destroy($kode_pelanggaran);
        return redirect('admin');
    }



}
