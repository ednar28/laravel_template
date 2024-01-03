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
        Schema::create('pengadaan', function (Blueprint $table) {
            $table->id('idpengadaan');
            $table->foreignId('user_iduser')->constrained('users', 'iduser');
            $table->foreignId('vendor_idvendor')->constrained('vendor', 'idvendor');
            $table->integer('subtotal_nilai');
            $table->integer('ppn');
            $table->integer('total_nilai');
            $table->char('status');
            $table->timestamp('timestamp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengadaan');
    }
};
