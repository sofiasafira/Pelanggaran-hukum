<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //id pengadilan
            $table->string('kode_jenis_id');
            $table->foreign('kode_jenis_id')->references('kode_jenis')->on('jenis_pengadilans')->onDelete('cascade');
            $table->string('kode_kab_id');
            $table->foreign('kode_kab_id')->references('kode_kab')->on('kabupatens')->onDelete('cascade');
            $table->string('nama_pengadilan');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('gambar');
            $table->string('alamat');
            $table->string('website');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
