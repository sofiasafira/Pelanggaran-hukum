<?php

namespace App\Http\Controllers;

use App\Models\DataPelanggaran;
use App\Http\Requests\StoreDataPelanggaranRequest;
use App\Http\Requests\UpdateDataPelanggaranRequest;

class DataPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
}
