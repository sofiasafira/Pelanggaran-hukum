<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desas', function (Blueprint $table) {
            $table->string('kode_des')->primary();
            $table->string('kode_kec_id');
            $table->foreign('kode_kec_id')->references('kode_kec')->on('kecamatans');
            $table->string('nama_des');
            $table->string('geojson_des');
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
        Schema::dropIfExists('desas');
    }
}
