<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorekehadiranRequest;
use App\Http\Requests\UpdatekehadiranRequest;
use App\Models\kehadiran;

class KehadiranController extends Controller
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
     * @param  \App\Http\Requests\StorekehadiranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorekehadiranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function show(kehadiran $kehadiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function edit(kehadiran $kehadiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekehadiranRequest  $request
     * @param  \App\Models\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekehadiranRequest $request, kehadiran $kehadiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function destroy(kehadiran $kehadiran)
    {
        //
    }
}
