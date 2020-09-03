<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateParcelasLancamentoGerencial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parcelas_lancamento_gerencial', function (Blueprint $table) {
            $table->unsignedInteger('parcelas_lancamento_gerencial_cliente_id');
            $table->foreign('parcelas_lancamento_gerencial_cliente_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parcelas_lancamento_gerencial', function (Blueprint $table){
        });
    }
}
