<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');     // diperbaiki dari jenis_obat
            $table->integer('jumlah')->nullable();  // nullable sesuai input controller
            $table->string('jenis')->nullable();    // jenis obat
            $table->string('kemasan');
            $table->decimal('harga', 10, 2);        // kolom harga ditambahkan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
