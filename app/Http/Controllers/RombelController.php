<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorerombelRequest;
use App\Http\Requests\UpdaterombelRequest;
use App\Models\rombel;
use Illuminate\Http\Request;
use App\Exports\rombelExport;
use App\Imports\rombelImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\tahun_akademik;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = rombel::all();
      return view('admin.inputrombel', compact('data'));

    }

    public function exportrombel()
    {
      return Excel::download(new rombelExport,'rombelexport.xlsx');
    }
    public  function importsrombel(Request $req)
    {

      $file = $req->file('file');
      $filename = $file->getClientOriginalName();
      $file->move('DataRombel',$filename);
      $hasil = Excel::import(new rombelImport,public_path('/DataRombel/'.$filename));
      if($hasil){
        session()->flash("success", "Berhasil Mengimport Rombel");
        return redirect('admin/rombel');
      }else{
        session()->flash("error", "Tidak Berhasil Mengimport Rombel");
        return redirect('admin/rombel');
      }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
      $data = [
            'nama'              => $req->nama,
            'id_sekolah'        => auth()->user()->id_sekolah,
            'tahun_akademik'    => tahun_akademik::get(auth()->user()->id_sekolah)->tahun_akademik
        ];
      $input = rombel::create($data);
      if($input){
        session()->flash("success", "Berhasil Menambahkan Rombel");
        return redirect('admin/rombel');
      }else{
        session()->flash("error", "Tidak Berhasil Menambahkan Rombel");
        return redirect('admin/rombel');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorerombelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorerombelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function show(rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function edit(rombel $rombel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdaterombelRequest  $request
     * @param  \App\Models\rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdaterombelRequest $request, rombel $rombel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function destroy(rombel $rombel)
    {
        if($rombel->latest('created_at')->firstWhere('nama',request()->data)->delete())
        {
          session()->flash("success", "Berhasil Menghapus Rombel");
         }else{
          session()->flash("error", "Gagal Menghapus Rombel");
         }
        return redirect('admin/rombel');
    }
}
