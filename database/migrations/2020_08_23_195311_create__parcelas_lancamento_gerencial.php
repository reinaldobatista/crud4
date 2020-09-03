<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelasLancamentoGerencial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Parcelas_lancamento_gerencial', function (Blueprint $table) {
            $table->Increments('id');
            $table->double('value',10,2);
            $table->unsignedInteger('lancamento_gerencial_id');
            $table->Integer('number_parcela');
            $table->foreign('lancamento_gerencial_id')->references('id')->on('lancamento_gerencial')->onDelete('restrict')->onUpdate('cascade');
            $table->date('data_vencimento')->nullable();
            $table->date('data_pagamento')->nullable();
            $table->double('valor_recebido',10,2)->nullable();
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
        Schema::dropIfExists('Parcelas_lancamento_gerencial');
    }
}
