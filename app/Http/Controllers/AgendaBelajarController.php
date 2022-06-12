<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeagenda_belajarRequest;
use App\Http\Requests\Updateagenda_belajarRequest;
use App\Models\agenda_belajar;

class AgendaBelajarController extends Controller
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
     * @param  \App\Http\Requests\Storeagenda_belajarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeagenda_belajarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\agenda_belajar  $agenda_belajar
     * @return \Illuminate\Http\Response
     */
    public function show(agenda_belajar $agenda_belajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agenda_belajar  $agenda_belajar
     * @return \Illuminate\Http\Response
     */
    public function edit(agenda_belajar $agenda_belajar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateagenda_belajarRequest  $request
     * @param  \App\Models\agenda_belajar  $agenda_belajar
     * @return \Illuminate\Http\Response
     */
    public function update(Updateagenda_belajarRequest $request, agenda_belajar $agenda_belajar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agenda_belajar  $agenda_belajar
     * @return \Illuminate\Http\Response
     */
    public function destroy(agenda_belajar $agenda_belajar)
    {
        //
    }
}
