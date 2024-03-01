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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_jual');
            $table->enum('metode_pembayaran',['on_site', 'delivery']);
            $table->double('total_pendapatan');
            $table->unsignedBigInteger('pembeli_id')->index();
            $table->foreign('pembeli_id')->references('id')->on('pembelis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
