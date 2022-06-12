<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapels', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mapel');
            $table->string('kelas');
            $table->string('nama_guru');
            $table->string('id_sekolah');
            $table->foreign('id_sekolah')->references('id_sekolah')->on('sekolahs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tahun_akademik');
            $table->foreign('tahun_akademik')->references('tahun_akademik')->on('tahun_akademiks')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('mapels');
    }
}
