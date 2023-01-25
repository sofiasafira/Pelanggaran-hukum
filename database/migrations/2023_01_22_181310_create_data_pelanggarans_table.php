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
            $table->string('kode_pelanggaran')->primary();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('kode_direktori');
            $table->foreign('kode_direktori')->references('kode_direktori')->on('direktoris')->onDelete('cascade');
            $table->string('kode_klasifikasi');
            $table->foreign('kode_klasifikasi')->references('kode_klasifikasi')->on('klasifikasis')->onDelete('cascade');
            $table->text('deskripsi');
            $table->timestamp('tanggal')->nullable();
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
