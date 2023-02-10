<?php

namespace App\Http\Controllers;

use App\Models\Direktori;
use App\Http\Requests\StoreDirektoriRequest;
use App\Http\Requests\UpdateDirektoriRequest;

class DirektoriController extends Controller
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
     * @param  \App\Http\Requests\StoreDirektoriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDirektoriRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Direktori  $direktori
     * @return \Illuminate\Http\Response
     */
    public function show(Direktori $direktori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Direktori  $direktori
     * @return \Illuminate\Http\Response
     */
    public function edit(Direktori $direktori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDirektoriRequest  $request
     * @param  \App\Models\Direktori  $direktori
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDirektoriRequest $request, Direktori $direktori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Direktori  $direktori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direktori $direktori)
    {
        //
    }
}
