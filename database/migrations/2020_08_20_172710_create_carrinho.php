<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinho', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->double('qtd',10,2);
            $table->unsignedInteger('products_car_id');
            $table->foreign('products_car_id')->references('id')->on('product')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedInteger('carrinho_status_id');
            $table->foreign('carrinho_status_id')->references('id')->on('status_carrinho')->onDelete('restrict')->onUpdate('cascade');
            $table->double('value',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrinho');
    }
}
