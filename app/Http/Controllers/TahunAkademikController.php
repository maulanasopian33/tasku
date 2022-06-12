<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storetahun_akademikRequest;
use App\Http\Requests\Updatetahun_akademikRequest;
use App\Models\pucukidea;
use App\Models\tahun_akademik;

class TahunAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tahun_akademik::all()->where('id_sekolah',auth()->user()->id_sekolah);
        return view('admin.tahun_akademik', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'tahun_akademik'    => request()->tahun_akademik,
            'id_sekolah'        => auth()->user()->id_sekolah,
            'id_tahunakademik'  => pucukidea::buatuid(auth()->user()->id_sekolah.request()->tahun_akademik)
        ];

        $push = tahun_akademik::create($data);
        return redirect()->route('tahun_akademik');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storetahun_akademikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storetahun_akademikRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tahun_akademik  $tahun_akademik
     * @return \Illuminate\Http\Response
     */
    public function show(tahun_akademik $tahun_akademik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tahun_akademik  $tahun_akademik
     * @return \Illuminate\Http\Response
     */
    public function edit(tahun_akademik $tahun_akademik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatetahun_akademikRequest  $request
     * @param  \App\Models\tahun_akademik  $tahun_akademik
     * @return \Illuminate\Http\Response
     */
    public function update(Updatetahun_akademikRequest $request, tahun_akademik $tahun_akademik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tahun_akademik  $tahun_akademik
     * @return \Illuminate\Http\Response
     */
    public function destroy(tahun_akademik $tahun_akademik)
    {
        if($tahun_akademik->latest('created_at')->firstWhere('id_tahunakademik',request()->data)->delete())
        {
          session()->flash("success", "Berhasil Menghapus Tahun Akademik");
         }else{
          session()->flash("error", "Gagal Menghapus Tahun Akademik");
         }
        return redirect()->route('tahun_akademik');
    }
}
