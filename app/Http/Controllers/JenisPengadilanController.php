<?php

namespace App\Http\Controllers;

use App\Models\JenisPengadilan;
use App\Http\Requests\StoreJenisPengadilanRequest;
use App\Http\Requests\UpdateJenisPengadilanRequest;

class JenisPengadilanController extends Controller
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
     * @param  \App\Http\Requests\StoreJenisPengadilanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisPengadilanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPengadilan  $jenisPengadilan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPengadilan $jenisPengadilan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPengadilan  $jenisPengadilan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisPengadilan $jenisPengadilan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisPengadilanRequest  $request
     * @param  \App\Models\JenisPengadilan  $jenisPengadilan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisPengadilanRequest $request, JenisPengadilan $jenisPengadilan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPengadilan  $jenisPengadilan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPengadilan $jenisPengadilan)
    {
        //
    }
}
