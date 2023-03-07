<?php

namespace App\Http\Controllers;

use App\Models\DataPelanggaran;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDataPelanggaranRequest;
use App\Http\Requests\UpdateDataPelanggaranRequest;
use App\Models\Direktori;
use App\Models\Klasifikasi;
use Illuminate\Support\Facades\DB;

class DataPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //table data pelanggaran
        $datas_pelanggaran = DB::table('data_pelanggarans')->get();

        // return view 
        return view('admin.add_data', [
            'title' => 'add_data',
            'datas_pelanggaran' => $datas_pelanggaran

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $direktoris = Direktori::get();
        $model = new  DataPelanggaran;
        return view('admin.add_item_pelanggaran', compact('model'), [
            "title" => "add_item_pelanggaran",
            'direktoris' => $direktoris
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

        // DataPelanggaran::create($request->all());

        DB::table('data_pelanggarans')->insert([
            'kode_pelanggaran' => $request->kode_pelanggaran,
            'tanggal' => $request->tanggal,
            'kode_direktori_id' => $request->kode_direktori,
            'kode_klasifikasi_id' => $request->kode_klasifikasi,
            'user_id' => $request->user_id,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPelanggaran  $dataPelanggaran
     * @return \Illuminate\Http\Response
     */
    public function show(DataPelanggaran $dataPelanggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPelanggaran  $dataPelanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPelanggaran $dataPelanggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataPelanggaranRequest  $request
     * @param  \App\Models\DataPelanggaran  $dataPelanggaran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataPelanggaranRequest $request, DataPelanggaran $dataPelanggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPelanggaran  $dataPelanggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPelanggaran $kode_pelanggaran)
    {
        //
        DataPelanggaran::destroy($kode_pelanggaran);
        // $dataPelanggaran = DataPelanggaran::find($kode_pelanggaran);
        // $dataPelanggaran->delete();
        // User::destroy($id);
        // $dataPelanggaran = DataPelanggaran::destroy($kode_pelanggaran);
        // $dataPelanggaran->delete();

        return redirect('admin');
    }


    // ajax method

    public function getDirektoris()
    {
        $direktoris = Direktori::get();
        $klasifikasi = Klasifikasi::get();
        return view('admin.add_item_pelanggaran', [
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
}
