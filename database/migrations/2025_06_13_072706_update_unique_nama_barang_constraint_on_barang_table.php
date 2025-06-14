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
         Schema::table('barang', function (Blueprint $table) {
            $table->dropUnique('barang_nama_barang_unique');

            $table->unique(['user_id', 'nama_barang']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('barang', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'nama_barang']);
            $table->unique('nama_barang');
        });
    }
};
