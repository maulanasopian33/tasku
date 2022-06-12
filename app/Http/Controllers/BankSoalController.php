<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storebank_soalRequest;
use App\Http\Requests\Updatebank_soalRequest;
use App\Models\bank_soal;

class BankSoalController extends Controller
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
     * @param  \App\Http\Requests\Storebank_soalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storebank_soalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bank_soal  $bank_soal
     * @return \Illuminate\Http\Response
     */
    public function show(bank_soal $bank_soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bank_soal  $bank_soal
     * @return \Illuminate\Http\Response
     */
    public function edit(bank_soal $bank_soal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatebank_soalRequest  $request
     * @param  \App\Models\bank_soal  $bank_soal
     * @return \Illuminate\Http\Response
     */
    public function update(Updatebank_soalRequest $request, bank_soal $bank_soal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bank_soal  $bank_soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(bank_soal $bank_soal)
    {
        //
    }
}
