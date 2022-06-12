<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pucukidea;
use App\Models\sekolah;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;
use Session;
class logincontroller extends Controller
{
    public function index(){
          return view('auth.login');
    }

    public function login(Request $req){
      request()->validate([
        'username' => 'required',
        'password' => 'required',
        ]);
        $login = $req->only('username','password');
        if (Auth::attempt($login)) {
          return $this->ceklevel();
        }
        session()->flash("error", "Tidak bisa masuk dengan akun tersebut, silahkan coba lagi..");
        return redirect('login');
    }
    public function ceklevel(){
      $user = Auth::User();
        if($user->level == 'admin'){
          return redirect('admin/dashboard');
        }elseif ($user->level == 'guru') {
          return redirect('guru/dashboard');

        }elseif ($user->level == 'user') {
          return redirect('user/dashboard');
        }
    }
    public function registrasi(){
      return view('admin.registersekolah');
    }
    public function prosesregistrasisekolah(Request $request){

        $validator = Validator::make($request->all(), [
            'username'     => 'required|unique:users',
            'email'        => 'required|unique:users',
            'password'     => 'required',
            'nama_sekolah' => 'required|unique:sekolahs',
            'alamat'       => 'required',
          ]);

        if ($validator->fails()) {
                session()->flash("error", "Tidak bisa membuat akun sekoiah, silahkan coba lagi..");
                return redirect()->route('Registrasi');
        }
        $uid = pucukidea::buatuid(request()->nama_sekolah);
        $data = [
            'nama_sekolah' => $request->nama_sekolah,
            'alamat'       => $request->alamat,
            'id_sekolah'   => $uid,
            'icon'         => 'm',
        ];

        try {
            $hasil = sekolah::create($data);
            $data2 = [
                'name'          => $request->username,
                'username'      => $request->username,
                'level'         => 'admin',
                'email'         => $request->email,
                'id_sekolah'    => $uid,
                'password'      => bcrypt($request->password)
            ];
            try{
                $hasil = User::create($data2);
                session()->flash("berhasil", "Berhasil membuat akun sekolah, silahkan login dengan akun yang berhasil di buat");
                return redirect()->route('login');
            }catch (Exception $a){
                session()->flash("error", $a->getMessage());
                return redirect()->route('Registrasi');
            }
          } catch (Exception $e) {
            session()->flash("error", $e->getMessage());
            return redirect()->route('Registrasi');

          }
    }
    public function logout(){
      // session()::flush();
      Auth::logout();

      return redirect('login');
    }
}
