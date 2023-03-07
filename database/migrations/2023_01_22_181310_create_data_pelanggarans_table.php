<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPelanggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pelanggarans', function (Blueprint $table) {
            $table->id('kode_pelanggaran');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('kode_direktori_id');
            $table->foreign('kode_direktori_id')->references('kode_direktori')->on('direktoris')->onDelete('cascade');
            $table->string('kode_klasifikasi_id');
            $table->foreign('kode_klasifikasi_id')->references('kode_klasifikasi')->on('klasifikasis')->onDelete('cascade');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal')->nullable();
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
        Schema::dropIfExists('data_pelanggarans');
    }
}
