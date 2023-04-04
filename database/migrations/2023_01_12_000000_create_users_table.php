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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('username',100);
            $table->string('password');
            $table->unsignedBigInteger('id_outlet');
            $table->enum('role',['admin','kasir','owner']);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_outlet')->references('id')->on('outlet_15453')->cascadeOnDelete();
        });
        Schema::rename('users', 'user_15453');
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_15453');
    }
};
