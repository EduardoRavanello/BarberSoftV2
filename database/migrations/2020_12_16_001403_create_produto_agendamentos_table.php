<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_agendamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_produto')->unsigned()->nullable();
            $table->foreign('id_produto')->references('id_produto')->on('produtos');
            $table->bigInteger('id_agendamento')->unsigned()->nullable();
            $table->foreign('id_agendamento')->references('id_agendamento')->on('agendamentos');
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
        Schema::dropIfExists('produto_agendamentos');
    }
}
