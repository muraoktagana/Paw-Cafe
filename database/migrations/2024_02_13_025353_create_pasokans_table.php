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
        Schema::create('pasokans', function (Blueprint $table) {
            $table->id();
            $table->double('harga_pasokan');
            $table->string('satuan');
            $table->integer('jumlah_beli');
            $table->unsignedBigInteger('stok_bahan_baku_id')->index();
            $table->foreign('stok_bahan_baku_id')->references('id')->on('stok_bahan_bakus');
            $table->unsignedBigInteger('pemasokan_id')->index();
            $table->foreign('pemasokan_id')->references('id')->on('pemasokans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasokans');
    }
};
