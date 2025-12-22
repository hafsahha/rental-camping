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
        Schema::create('rent_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');   
            $table->string('nama_penyewa');                    
            $table->date('rent_date');
            $table->date('return_date')->nullable();
            $table->date('actual_return_date')->nullable();
            $table->integer('lama_hari');
            $table->double('total_harga_sewa');
            $table->string('bukti_penyerahan')->nullable();
            $table->string('bukti_pengembalian')->nullable();
            $table->double('total_denda')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_logs');
    }
};
