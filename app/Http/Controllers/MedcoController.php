<?php

namespace App\Http\Controllers;

use App\Models\Medco;
use App\Http\Requests\StoreMedcoRequest;
use App\Http\Requests\UpdateMedcoRequest;

class MedcoController extends Controller
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
     * @param  \App\Http\Requests\StoreMedcoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedcoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medco  $medco
     * @return \Illuminate\Http\Response
     */
    public function show(Medco $medco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medco  $medco
     * @return \Illuminate\Http\Response
     */
    public function edit(Medco $medco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedcoRequest  $request
     * @param  \App\Models\Medco  $medco
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedcoRequest $request, Medco $medco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medco  $medco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medco $medco)
    {
        //
    }
}
