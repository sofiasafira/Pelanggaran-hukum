<?php

namespace App\Http\Controllers;

use App\Models\DataPelanggaran;
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
        $model = new  DataPelanggaran;
        return view('admin.add_item_pelanggaran', compact('model'), [
            "title" => "add_item_pelanggaran"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDataPelanggaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataPelanggaranRequest $request)
    {
        //
        // $model = new DataPelanggaran;
        // $model->kode_pelanggaran = $request->kode_pelanggaran;
        // $model->tanggal = $request->tanggal;
        // $model->kode_pelanggaran = $request->kode_pelanggaran;
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
    public function destroy(DataPelanggaran $dataPelanggaran)
    {
        //
    }


    // ajax method

    public function getDirektoris()
    {
        $direktoris = Direktori::get();
        $klasifikasi = Klasifikasi::get();
        return view('admin.add_item_pelanggaran', [
            'title' => "add-item-pelanggaran",
            'direktoris' => $direktoris,
            'klasifikasi' => $klasifikasi
        ]);
    }

    public function getKlasifikasi($kode_direktori_id)
    {
        $klasifikasi = Klasifikasi::where('kode_direktori_id', $kode_direktori_id)->get();
        return response()->json($klasifikasi);
    }
}
