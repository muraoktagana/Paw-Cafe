<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('toppings', function (Blueprint $table) {
            $table->id();
            $table->string('topping');
            $table->string('gambar_topping');
            $table->double('harga_tambah_topping');
            $table->unsignedBigInteger('stok_bahan_baku_id')->index();
            $table->foreign('stok_bahan_baku_id')->references('id')->on('stok_bahan_bakus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toppings');
    }
};
