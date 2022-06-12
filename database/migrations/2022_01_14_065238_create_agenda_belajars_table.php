<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaBelajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_belajars', function (Blueprint $table) {
            $table->id();
            $table->string('id_sekolah');
            $table->foreign('id_sekolah')->references('id_sekolah')->on('sekolahs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tahun_akademik');
            $table->string('kelas');
            $table->string('nama_agenda');
            $table->string('keterangan');
            $table->timestamps();
            $table->foreign('tahun_akademik')->references('tahun_akademik')->on('tahun_akademiks')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda_belajars');
    }
}
