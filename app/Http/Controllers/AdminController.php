<?php

namespace App\Http\Controllers;

use App\Models\guru;
use Illuminate\Http\Request;
use App\Models\rombel;
use App\Models\siswa;
use App\Models\tahun_akademik;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $tahun = tahun_akademik::get(auth()->user()->id_sekolah);
        $rombel= rombel::all()->where('id_sekolah',auth()->user()->id_sekolah);
        $siswa = siswa::all()->where('id_sekolah',auth()->user()->id_sekolah);
        // ddd(tahun_akademik::get(auth()->user()->id_sekolah));
        if($tahun == null){
            $tahun = "Belum di atur";
        }else{
            $tahun = $tahun->tahun_akademik;
        }
        $guru  = guru::all()->where('id_sekolah',auth()->user()->id_sekolah)->count();
        
        return view('admin.dashboard',[
            'tahun_akademik' => $tahun,
            'guru'           => $guru,
            'rombel'         => count($rombel),
            'siswa'          => count($siswa),
        ]);
    }


}
