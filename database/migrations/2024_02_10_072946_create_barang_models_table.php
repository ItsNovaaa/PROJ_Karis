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
        Schema::create('barang_model', function (Blueprint $table) {
            $table->id('id_barang')->unique();
            $table->string('nama_barang')->nullable();
            $table->string('kode_barang')->nullable();
            $table->string('kategori_barang')->nullable();
            $table->integer('jumlah_barang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_model');
    }
};
