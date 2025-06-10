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
        
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id('id_pemasukan');
            $table->foreignId('transaksi_id')->nullable()->constrained('transaksi', 'id_transaksi')->onDelete('set null');
            $table->integer('jumlah');
            $table->string('sumber')->nullable();
            $table->date('tanggal');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
        });

        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id('id_pengeluaran');
            $table->string('nama_pengeluaran');
            $table->integer('jumlah');
            $table->string('jenis'); 
            $table->date('tanggal');
            $table->foreignId('barang_id')->nullable()->constrained('barang', 'id_barang')->onDelete('set null');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
        });

        Schema::create('restock_log', function (Blueprint $table) {
            $table->id('id_restock');
            $table->foreignId('barang_id')->constrained('barang', 'id_barang')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('harga_beli');
            $table->integer('total');
            $table->text('catatan')->nullable();
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan');
        Schema::dropIfExists('pengeluaran');
        Schema::dropIfExists('restock_log');
    }
};
