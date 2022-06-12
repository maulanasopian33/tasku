<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunAkademiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahun_akademiks', function (Blueprint $table) {
            $table->string('id_sekolah');
            $table->foreign('id_sekolah')->references('id_sekolah')->on('sekolahs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tahun_akademik')->unique('column');
            $table->primary('id_tahunakademik');
            $table->string('id_tahunakademik');
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
        Schema::dropIfExists('tahun_akademiks');
    }
}
