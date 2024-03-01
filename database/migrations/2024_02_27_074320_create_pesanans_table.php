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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->double('harga_jual');
            $table->integer('jumlah_beli');
            $table->unsignedBigInteger('produk_id')->index();
            $table->foreign('produk_id')->references('id')->on('menus');
            $table->unsignedBigInteger('penjualan_id')->index();
            $table->foreign('penjualan_id')->references('id')->on('penjualans');
            $table->bigInteger('topping_id')->nullable()->unsigned();
            $table->foreign('topping_id')->references('id')->on('toppings');
            $table->bigInteger('cup_id')->nullable()->unsigned();
            $table->foreign('cup_id')->references('id')->on('cups');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
