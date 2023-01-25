<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlasifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klasifikasis', function (Blueprint $table) {
            $table->string('kode_klasifikasi')->primary();
            $table->string('nama_klasifikasi');
            $table->string('kode_direktori_id');
            $table->foreign('kode_direktori_id')->references('kode_direktori')->on('direktoris')->onDelete('cascade');
            $table->string('kode_jenis_id');
            $table->foreign('kode_jenis_id')->references('kode_jenis')->on('jenis_pengadilans')->onDelete('cascade');
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
        Schema::dropIfExists('klasifikasis');
    }
}
