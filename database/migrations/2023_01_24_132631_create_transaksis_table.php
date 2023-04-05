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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_outlet');
            $table->string('kode_invoice', 100);
            $table->unsignedBigInteger('id_member');
            $table->dateTime('tgl');
            $table->datetime('batas_waktu');
            $table->timestamp('tgl_bayar')->nullable()->default(null);
            $table->integer('biaya_tambahan')->nullable();
            $table->double('diskon')->nullable();
            $table->integer('pajak')->nullable();
            $table->enum('status', ['baru', 'proses', 'selesai', 'diambil']);
            $table->enum('dibayar', ['dibayar', 'belum_dibayar'])->nullable();
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
            
            $table->foreign('id_outlet')->references('id')->on('outlet_15453')->cascadeOnDelete();
            $table->foreign('id_member')->references('id')->on('member_15453')->cascadeOnDelete();
            $table->foreign('id_user')->references('id')->on('user_15453')->cascadeOnDelete();
        });
        Schema::rename('transaksis', 'transaksi_15453');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_15453');
    }
};