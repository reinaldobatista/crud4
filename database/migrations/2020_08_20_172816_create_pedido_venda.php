<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_venda', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('products_id');
            $table->foreign('products_id')->references('id')->on('product')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('numberPedido');
            $table->integer('numberParcelas');
            $table->unsignedInteger('status_carrinho_id');
            $table->foreign('status_carrinho_id')->references('id')->on('status_carrinho')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('qtd');
            $table->double('value',10,2);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedInteger('status_pedido_venda_id');
            $table->foreign('status_pedido_venda_id')->references('id')->on('status_pedido_venda')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('pedido_venda');
    }
}
