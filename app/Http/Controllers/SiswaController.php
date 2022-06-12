<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresiswaRequest;
use App\Http\Requests\UpdatesiswaRequest;
use App\Models\siswa;
use App\Models\User;
use App\Models\rombel;
use Illuminate\Http\Request;
use App\Models\tahun_akademik;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = tahun_akademik::get(auth()->user()->id_sekolah)->tahun_akademik;
        $data = siswa::all()->where('id_sekolah',auth()->user()->id_sekolah);
        $user = User::all()->where('id_sekolah',auth()->user()->id_sekolah);
        $hasil = collect();
        $kelas = rombel::all()->where('id_sekolah', auth()->user()->id_sekolah)->where('tahun_akademik', $tahun);
        //dd($user->firstwhere('name','Maulana Sopian'));
        foreach ($data as $g){
          if($user->firstwhere('name', $g->nama_siswa) == null){
          $hasil->push([
            'nama_siswa' => $g->nama_siswa,
            'jk' => $g->jk,
            'kelas' => $g->kelas,
            'tahun_akademik' => $g->tahun_akademik,
            'status' => 'Buat Data',
            ]);
          }else{
          $hasil->push([
            'nama_siswa' => $g->nama_siswa,
            'jk' => $g->jk,
            'kelas' => $g->kelas,
            'tahun_akademik' => $g->tahun_akademik,
            'status' => 'Hapus data',
            ]);
          }
        }
        $datas = [
          'nama_siswa' => '',
          'jk' => '',
          'kelas' => '',
          'tahun_akademik' => '',
          'status' => '',
            ];

        return view('admin.siswa', [
          'hasil'   => $hasil,
          'data'    => collect($datas),
          'kelas'   => collect($kelas)
          ]);
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        // ddd($req->all());

        $data =[
            'nama_siswa'    => $req->nama,
            'jk'            => $req->jk,
            'kelas'         => $req->kelas,
            'tahun_akademik'=> tahun_akademik::get(auth()->user()->id_sekolah)->tahun_akademik,
            'id_sekolah'    => auth()->user()->id_sekolah
        ];

        $input = siswa::create($data);
        if($input){
            session()->flash("success", "Berhasil Menambahkan Data Guru");
            return redirect('admin/siswa');
        }else{
            session()->flash("error", "Tidak Berhasil Menambahkan Data Guru");
            return redirect('admin/siswa');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresiswaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesiswaRequest  $request
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesiswaRequest $request, siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(siswa $siswa)
    {
        //
    }
}
