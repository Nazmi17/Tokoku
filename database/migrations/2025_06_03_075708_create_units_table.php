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
        Schema::create('kategori', function (Blueprint $table) {
            $table->id("id_kategori");
            $table->string("nama_kategori")->unique();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->timestamps();
        });

        Schema::create('barang', function (Blueprint $table) {
            $table->id("id_barang");
            $table->string("nama_barang")->unique();
            $table->integer("harga_jual");
            $table->integer('stok');
            $table->foreignId('kategori_id')->constrained('kategori', 'id_kategori');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('barang');
    }
};
