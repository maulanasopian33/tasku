<?php

namespace App\Http\Controllers;

use App\Exports\akunguruExport;
use App\Exports\akunsiswa;
use App\Imports\guruImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuruakunController extends Controller
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
    public function exportguru()
    {
      return Excel::download(new akunguruExport,'akunguruexport.xlsx');
    }
    public function exportsiswa()
    {
      return Excel::download(new akunsiswa,'akunguruexport.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $validator = Validator::make($req->all(), [
          'username' => 'required|unique:users',
          'email' => 'required|unique:users',
          'password' => 'required',
        ]);

        if ($validator->fails()) {
          dd($validator->message);
            session()->flash("error", "Tidak Berhasil Menambahkan Akun Guru");
            return redirect('admin/guru');
        }
        $data =[
            'name'          => $req->nama,
            'username'      => $req->username,
            'level'         => 'guru',
            'email'         => $req->email,
            'password'      => bcrypt($req->password),
            'id_sekolah'    => auth()->user()->id_sekolah
          ];
        try {
            $hasil = User::create($data);

        } catch (Exception $e) {
            abort(404,$e->getMessage());
        }
            session()->flash("success", "Berhasil Menambahkan Akun Guru");
            return redirect('admin/guru');


          //session()->flash("error", "Tidak Berhasil Menambahkan Akun Guru");
         // return redirect('admin/guru');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreguruakunRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\guruakun  $guruakun
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guruakun  $guruakun
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateguruakunRequest  $request
     * @param  \App\Models\guruakun  $guruakun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guruakun  $guruakun
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        if(User::all()->firstWhere('name',request()->data)->delete())
        {
          session()->flash("success", "Berhasil Menghapus Akun Guru");
         }else{
          session()->flash("error", "Gagal Menghapus AkunGuru");
         }
        return redirect('admin/guru');
    }
}
