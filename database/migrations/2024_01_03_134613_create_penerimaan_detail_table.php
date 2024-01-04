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
        Schema::create('penerimaan_detail', function (Blueprint $table) {
            $table->id('iddetail_penerimaan');
            $table->foreignId('idpenerimaan')->constrained('penerimaan', 'idpenerimaan');
            $table->foreignId('barang_idbarang')->constrained('barang', 'idbarang');
            $table->integer('jumlah_terima');
            $table->integer('harga_satuan');
            $table->integer('sub_total_terima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaan_detail');
    }
};
