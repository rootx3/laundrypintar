<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_paket');
            $table->double('qty');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id')->on('transaksi_15453')->cascadeOnDelete();
            $table->foreign('id_paket')->references('id')->on('paket_15453')->cascadeOnDelete();
            
        });
        Schema::rename('detail_transaksis', 'detail_transaksi_15453');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * 
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi_15453');
    }
};
