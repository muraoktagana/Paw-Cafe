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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('produk');
            $table->text('gambar_produk');
            $table->double('harga_produk');
            $table->unsignedBigInteger('stok_bahan_baku_id')->index();
            // $table->unsignedBigInteger('diskon_id')->index();
            $table->bigInteger('diskon_id')->nullable()->unsigned();
            $table->unsignedBigInteger('kategori_id')->index();
            $table->foreign('stok_bahan_baku_id')->references('id')->on('stok_bahan_bakus');
            $table->foreign('diskon_id')->references('id')->on('diskons');
            $table->foreign('kategori_id')->references('id')->on('kategori_produks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
