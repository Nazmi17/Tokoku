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
 Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->integer('total_harga');
            $table->integer('dibayar');
            $table->integer('kembalian');
            $table->timestamps();
        });

        Schema::create('transaksi_detail', function (Blueprint $table) {
            $table->id('id_transaksi_detail');
            $table->foreignId('transaksi_id')->constrained('transaksi', 'id_transaksi')->onDelete('cascade');
            $table->foreignId('barang_id')->constrained('barang', 'id_barang')->onDelete('cascade');
            $table->integer('qty');
            $table->integer('harga_satuan');
            $table->integer('subtotal');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
        });    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('transaksi_detail');
    }
};
