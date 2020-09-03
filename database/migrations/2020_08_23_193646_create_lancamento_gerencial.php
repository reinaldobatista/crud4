<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLancamentoGerencial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamento_gerencial', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('description');
            $table->double('value',10,2);
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedInteger('pedido_id')->nullable();
            $table->foreign('pedido_id')->references('id')->on('pedido_venda')->onDelete('restrict')->onUpdate('cascade');
            $table->date('data_compra');
            $table->unsignedInteger('status_pedido_venda_id');
            $table->foreign('status_pedido_venda_id')->references('id')->on('status_pedido_venda')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipo_operacao')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('lancamento_gerencial');
    }
}
