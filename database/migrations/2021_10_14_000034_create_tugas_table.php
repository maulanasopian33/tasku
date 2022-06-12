<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->string('id_sekolah');
            $table->foreign('id_sekolah')->references('id_sekolah')->on('sekolahs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('kelas');
            $table->string('jenis_pengumpulan');
            $table->string('nama_tugas');
            $table->string('waktu_pengumpulan');
            $table->string('tahun_akademik');
            $table->foreign('tahun_akademik')->references('tahun_akademik')->on('tahun_akademiks')->onDelete('cascade')->onUpdate('cascade');
            $table->string('id_tugas');
            $table->primary('id_tugas');
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
        Schema::dropIfExists('tugas');
    }
}
