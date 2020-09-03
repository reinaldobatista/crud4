<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeposito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposito', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('story_id');
            $table->foreign('story_id')->references('id')->on('story')->onDelete('restrict')->onUpadate('cascade');
            $table->unsignedInteger('products_id');
            $table->foreign('products_id')->references('id')->on('product')->onDelete('restrict')->onUpadate('cascade');
            $table->double('qtd',10,2);
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('restrict')->onUpadate('cascade');
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
        Schema::dropIfExists('deposito');
    }
}
