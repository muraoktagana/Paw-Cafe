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
        Schema::create('cups', function (Blueprint $table) {
            $table->id();
            $table->string('cup');
            $table->string('ukuran');
            $table->double('harga_tambah_cup');
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
        Schema::dropIfExists('cups');
    }
};
