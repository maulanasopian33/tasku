<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class akun extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $akun = [
          [
            'name'=>'Admin',
            'username'=> 'admin',
            'level'=>'admin',
            'id_sekolah'=>'smk yasalam',
            'email'=>'admin@tasku.com',
            'password'=>bcrypt('admin123')
          ],
          [
            'name'=>'GuruTes',
            'username'=> 'guru',
            'level'=>'guru',
            'id_sekolah'=>'smk yasalam',
            'email'=>'guru@tasku.com',
            'password'=>bcrypt('guru123'),
          ],
          [
            'name'=>'userTes',
            'username'=> 'user',
            'level'=>'user',
            'id_sekolah'=>'smk yasalam',
            'email'=>'user@tasku.com',
            'password'=>bcrypt('user123'),
          ],
          [
            'name'=>'Nama Lengkap',
            'username'=> 'Username harus unik',
            'level'=>'user',
            'id_sekolah'=>'smk yasalam',
            'email'=>'Email harus unik',
            'password'=>'Password',
          ]
          ];
        foreach ($akun as $value) {
          User::create($value);

        }
    }
}
