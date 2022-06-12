<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TahunAkademikController;
use App\Models\tahun_akademik;

Route::get('/', function () {
    return redirect('login');
});

Route::get('Profil', function(){
    return view('admin.profil');
});

Route::get('test', function(){
  return view('test');
});
Route::put('guru/dashboard', function() {
    return view('guru/dashboardguru');
});
Route::get('guru/dashboard', function() {
  return view('guru.dashboardguru');
});
//auth proses
Route::get('login',['App\Http\Controllers\logincontroller','index'])->name('login'); //Beres
Route::get('registrasi','App\Http\Controllers\logincontroller@registrasi')->name('Registrasi'); //beres
Route::post('proseslogin','App\Http\Controllers\logincontroller@login')->name('proseslogin'); //beres
Route::post('prosesregistrasisekolah','App\Http\Controllers\logincontroller@prosesregistrasisekolah')->name('prosesregistrasisekolah'); //beres
Route::get('Logout','App\Http\Controllers\logincontroller@logout')->name('logout'); //beres


//auth middleware
Route::group(['middleware' => ['auth']], function(){
//auth level admin
  Route::group(['middleware' => 'login:admin'], function(){
    //route admin service
    Route::get('admin/', function(){
      return redirect()->route('dashboard.admin');
    });
    Route::get('admin/dashboard','App\Http\Controllers\AdminController@index')->name('dashboard.admin');
    Route::get('admin/rombel','App\Http\Controllers\RombelController@index')->name('admin.rombel');
    
    // ==========================  Route siswa ============================= 
    Route::get('admin/siswa','App\Http\Controllers\SiswaController@index')->name('admin.Siswa');
    Route::post('admin/prosessiswa','App\Http\Controllers\SiswaController@create')->name('admin.prosessiswa');
    // ========================== End siswa ================================

    // ==========================  Route tahun akademik ============================= 
    Route::get('admin/tahun-akademik','App\Http\Controllers\TahunAkademikController@index')->name('tahun_akademik');
    Route::post('admin/prosestahunakademik','App\Http\Controllers\TahunAkademikController@create')->name('prosestahunakademik'); //V
    Route::get('admin/tahun-akademik/hapus','App\Http\Controllers\TahunAkademikController@destroy')->name('hapustahunakademik'); //V
    // ========================== End Tahun Akademik ================================

    // ============================== Route Manage Guru =================================
    Route::get('admin/guru','App\Http\Controllers\GuruController@index')->name('admin.Guru'); // V
    Route::get('admin/guru/export','App\Http\Controllers\GuruController@exportguru')->name('exportguru');
    Route::get('admin/guru/hapus','App\Http\Controllers\GuruController@destroy')->name('hapusdata');
    Route::get('admin/guru/edit','App\Http\Controllers\GuruController@edit')->name('edit.guru');
    Route::get('admin/guru/editdata','App\Http\Controllers\GuruController@editdata')->name('Editdata');
    Route::get('admin/guru/hapusakun','App\Http\Controllers\GuruakunController@destroy')->name('hapusakun');
    Route::post('admin/guru/update','App\Http\Controllers\GuruController@update')->name('updatedata');
    Route::post('admin/guru/buatakun','App\Http\Controllers\GuruakunController@create')->name('createakun');
    Route::post('admin/guru/import','App\Http\Controllers\GuruController@importguru')->name('importguru');
    Route::post('admin/prosesguru','App\Http\Controllers\GuruController@create')->name('manageguru');
    // ================================= End manage guru =================================

    // =============================== Manage Mapel start ==================================
    Route::get('admin/managemapel', 'App\Http\Controllers\MapelController@index')->name('manage.mapel');
    Route::post('admin/mapel/simpan', 'App\Http\Controllers\MapelController@create')->name('proses.mapel');
    Route::get('admin/managemapel/hapus','App\Http\Controllers\MapelController@destroy')->name('hapus.mapel');
    Route::post('admin/mapel/edit','App\Http\Controllers\MapelController@update')->name('edit.mapel');
    Route::get('admin/managemapel/sortbykelas/{value}', 'App\Http\Controllers\MapelController@sortby')->name('mapel.viewby');
    // =============================== End manage mapel ====================================

    Route::post('admin/prosesrombel','App\Http\Controllers\RombelController@create')->name('managerombel');
    Route::get('admin/rombel/hapus','App\Http\Controllers\RombelController@destroy')->name('hapusrombel');
    Route::get('admin/rombel/export','App\Http\Controllers\RombelController@exportrombel')->name('exportrombel');
    Route::post('admin/rombel/import','App\Http\Controllers\RombelController@importsrombel')->name('importsrombel');


    //Route::get('admin/akunguru/export','App\Http\Controllers\GuruakunController@exportguru')->name('exportakunguru');
  });
  Route::group(['middleware' => 'login:user'], function(){
    Route::get('user/dashboard','App\Http\Controllers\UserController@index')->name('dashboard admin');
  });
});
