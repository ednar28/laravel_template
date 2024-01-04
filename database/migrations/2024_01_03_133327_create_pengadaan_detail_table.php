<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengadaan_detail', function (Blueprint $table) {
            $table->id('iddetail_pengadaan');
            $table->foreignId('idbarang')->constrained('barang', 'idbarang');
            $table->foreignId('idpengadaan')->constrained('pengadaan', 'idpengadaan');
            $table->integer('harga_satuan');
            $table->integer('jumlah');
            $table->integer('sub_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengadaan_detail');
    }
};
