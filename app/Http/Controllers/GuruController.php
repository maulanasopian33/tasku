<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreguruRequest;
use App\Http\Requests\UpdateguruRequest;
use App\Models\guru;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\guruExport;
use App\Imports\guruImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\tahun_akademik;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tahun = tahun_akademik::get(auth()->user()->id_sekolah);
        // if($tahun == null){
        //     $tahun = 'null';
        // }else{
        //     $tahun = $tahun->tahun_akademik;
        // }
        $data = guru::all()->where('id_sekolah',auth()->user()->id_sekolah);
        $user = User::all()->where('id_sekolah',auth()->user()->id_sekolah);
        $hasil = collect();

        foreach ($data as $g){
          if($user->firstwhere('name', $g->nama_guru) == null){
          $hasil->push([
            'Nama_guru' => $g->nama_guru,
            'Jk'        => $g->jk,
            'Jabatan'   => $g->jabatan,
            'status'    => 'Buat Data'
            ]);
          }else{
          $hasil->push([
            'Nama_guru' => $g->nama_guru,
            'Jk'        => $g->jk,
            'Jabatan'   => $g->jabatan,
            'status'    => 'Hapus data'
            ]);
        }
        }

        $datas = [
          'Nama_guru'   => '',
          'Jk'          => '',
          'Jabatan'     => '',
          'status'      => '',
            ];

        return view('admin.guru', [
          'hasil'   => $hasil->all(),
          'data'    => collect($datas),
          // 'tahun'   => $tahun
          ]);


    }
    public function exportguru()
    {
      return Excel::download(new guruExport,'guruexport.xlsx');
    }
    public  function importguru(Request $req)
    {

      $file = $req->file('file');
      $filename = $file->getClientOriginalName();
      $file->move('DataGuru',$filename);
      $hasil = Excel::import(new guruImport,public_path('/DataGuru/'.$filename));
      if($hasil){
        session()->flash("success", "Berhasil Mengimport Data Guru");
        return redirect('admin/guru');
      }else{
        session()->flash("error", "Tidak Berhasil Mengimport Data Guru");
        return redirect('admin/guru');
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
            'nama_guru'         => $req->nama,
            'jk'                => $req->jk,
            'jabatan'           => $req->jabatan,
            // 'tahun_akademik'    => tahun_akademik::get(auth()->user()->id_sekolah)->tahun_akademik,
            'id_sekolah'        => auth()->user()->id_sekolah
            ];
        $input = guru::create($data);
        if($input){
            session()->flash("success", "Berhasil Menambahkan Data Guru");
            return redirect('admin/guru');
        }else{
            session()->flash("error", "Tidak Berhasil Menambahkan Data Guru");
            return redirect('admin/guru');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreguruRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreguruRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(guru $guru)
    {
        $data = guru::all();
        $datas = $guru->firstWhere('nama_guru',request()->data);
        $user = User::all();
        $hasil = collect();
        $akun = '';
        //dd($user->firstwhere('name','Maulana Sopian'));
        foreach ($data as $g){
          if($user->firstwhere('name', $g->nama_guru) == null){
            $akun='0';
            $hasil->push([
              'Nama_guru'         => $g->nama_guru,
              'Jk'                => $g->jk,
              'Jabatan'           => $g->jabatan,
              'status'            => 'Buat Data'

              ]);
          }else{
            $akun='1';
            $hasil->push([
              'Nama_guru'         => $g->nama_guru,
              'Jk'                => $g->jk,
              'Jabatan'           => $g->jabatan,
              'status'            => 'Hapus data'
              ]);
          }
        }

        // ddd($datas['nama_guru']);
        return view('admin.guru', [
          'hasil' => $hasil->all(),
          'data' => $datas,
          'akun'  => $akun
          ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateguruRequest  $request
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $data = [
        'nama_guru'         => $req->nama,
        'jk'                => $req->jk,
        'jabatan'           => $req->jabatan,
        'tahun_akademik'    => tahun_akademik::get(auth()->user()->id_sekolah)->tahun_akademik,
        'id_sekolah'        => auth()->user()->id_sekolah
        ];
        $data1 =[
            'name'    => $req->nama
            ];

        $input = guru::all()->firstWhere('nama_guru',$req->id)->update($data);
        
        if($req->akun == '1')
        {
          $input2 = User::all()->firstWhere('name',$req->id)->update($data1);
        }
        
        // ddd($input2);

        if($input){
          session()->flash("success", "Berhasil Mengupdate Data Guru");
          return redirect('admin/guru');
        }else{
          session()->flash("error", "Tidak Berhasil Mengupa Data Guru");
          return redirect('admin/guru');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(guru $guru)
    {
        if($guru->latest('created_at')->firstWhere('Nama_guru',request()->data)->delete())
        {
          session()->flash("success", "Berhasil Menghapus Data Guru");
         }else{
          session()->flash("error", "Gagal Menghapus Rombel");
         }
        return redirect()->route('admin.Guru');
    }
}
