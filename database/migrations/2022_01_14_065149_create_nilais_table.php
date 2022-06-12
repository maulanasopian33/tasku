<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->string('id_sekolah');
            $table->foreign('id_sekolah')->references('id_sekolah')->on('sekolahs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('id_tugas');
            $table->string('nama_siswa');
            $table->string('nilai');
            $table->string('kelas');
            $table->string('tahun_akademik');
            $table->foreign('tahun_akademik')->references('tahun_akademik')->on('tahun_akademiks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tugas')->references('id_tugas')->on('tugas')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilais');
    }
}
