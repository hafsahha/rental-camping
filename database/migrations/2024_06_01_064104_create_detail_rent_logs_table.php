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
        Schema::create('detail_rent_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transaksi_rental');
            $table->unsignedBigInteger('id_barang');
            $table->double('harga_sewa');

            $table->foreign('id_transaksi_rental')->references('id')->on('rent_logs');
            $table->foreign('id_barang')->references('id')->on('barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_rent_logs');
    }
};
