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
        Schema::create('barang', function (Blueprint $table) {
            $table->id('idbarang');
            $table->foreignId('idsatuan')
            ->constrained('satuan', 'idsatuan');
            $table->char('jenis', 1);
            $table->string('nama', 45);
            $table->integer('harga');
            $table->integer('stok');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
