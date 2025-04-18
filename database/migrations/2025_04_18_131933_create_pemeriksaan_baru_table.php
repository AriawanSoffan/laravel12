<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanBaruTable extends Migration
{
    public function up()
    {
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_dokter');
            $table->date('tgl_periksa');
            $table->integer('biaya_periksa')->default(150000);
            $table->timestamps();

            $table->foreign('id_pasien')->references('id')->on('users');
            $table->foreign('id_dokter')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemeriksaan');
    }
}
