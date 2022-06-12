<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoremapelRequest;
use App\Http\Requests\UpdatemapelRequest;
use Illuminate\Http\Request;
use App\Models\mapel;
use App\Models\guru;
use App\Models\rombel;
use App\Models\tahun_akademik;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $guru  = guru::all()->where('id_sekolah',auth()->user()->id_sekolah);
        
        $mapel = mapel::all()->where('id_sekolah',auth()->user()->id_sekolah);
        $tahun = tahun_akademik::get(auth()->user()->id_sekolah)->tahun_akademik;
        $kelas = rombel::all()->where('id_sekolah', auth()->user()->id_sekolah)->where('tahun_akademik', $tahun);

        return view('admin.mapel', [
            'guru'   => collect($guru),
            'kelas'  => collect($kelas),
            'mapel'  => collect($mapel),
            'tahun'  => tahun_akademik::get(auth()->user()->id_sekolah)
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
         
         $data = [
            'nama_mapel'    => $req->nama_mapel,
            'kelas'         => $req->kelas,
            'nama_guru'     => $req->nama_guru,
            'id_sekolah'    => auth()->user()->id_sekolah,
            'tahun_akademik'=> tahun_akademik::get(auth()->user()->id_sekolah)->tahun_akademik
         ];

         $input = mapel::create($data);
        if($input){
            session()->flash("success", "Berhasil Menambahkan Mata pelajaran");
            return redirect('admin/managemapel');
        }else{
            session()->flash("error", "Tidak Berhasil Menambahkan Mata Pelajaran");
            return redirect('admin/managemapel');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremapelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(mapel $mapel)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemapelRequest  $request
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, mapel $mapel)
    {
        $data = [
            'nama_mapel'    => $req->nama_mapel,
            'kelas'         => $req->kelas,
            'nama_guru'     => $req->nama_guru,
            'id_sekolah'    => auth()->user()->id_sekolah,
            'tahun_akademik'=> tahun_akademik::get(auth()->user()->id_sekolah)->tahun_akademik
         ];

         $input = mapel::all()->firstWhere('nama_mapel',$req->id)->update($data);
        if($input){
            session()->flash("success", "Berhasil Menambahkan Mata pelajaran");
            return redirect('admin/managemapel');
        }else{
            session()->flash("error", "Tidak Berhasil Menambahkan Mata Pelajaran");
            return redirect('admin/managemapel');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(mapel $mapel)
    {
        if($mapel->latest('created_at')->firstWhere('nama_mapel',request()->data)->delete())
        {
          session()->flash("success", "Berhasil Menghapus Data Guru");
         }else{
          session()->flash("error", "Gagal Menghapus Rombel");
         }
        return redirect()->route('manage.mapel');
    }

    public function sortby(Request $req,$value){
        if ($value === "Tampilkan semua") {
            return redirect()->route('manage.mapel');
        }else{
            $mapel = mapel::all()->where('id_sekolah',auth()->user()->id_sekolah)->where('kelas', $value);
        }
        $guru  = guru::all()->where('id_sekolah',auth()->user()->id_sekolah);
        $tahun = tahun_akademik::get(auth()->user()->id_sekolah)->tahun_akademik;
        $kelas = rombel::all()->where('id_sekolah', auth()->user()->id_sekolah)->where('tahun_akademik', $tahun);
        
        
        return view('admin.mapel', [
            'guru'   => collect($guru),
            'kelas'  => collect($kelas),
            'mapel'  => collect($mapel),
            'tahun'  => tahun_akademik::get(auth()->user()->id_sekolah)
            
        ]);
    }
}
