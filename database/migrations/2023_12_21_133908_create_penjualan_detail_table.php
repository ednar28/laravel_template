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
        Schema::create('penjualan_detail', function (Blueprint $table) {
            $table->id('idpenjualan_detail');
            $table->foreignId('penjualan_idpenjualan')->constrained('penjualan', 'idpenjualan');
            $table->foreignId('idbarang')->constrained('barang', 'idbarang');
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
        Schema::dropIfExists('penjualan_detail');
    }
};
