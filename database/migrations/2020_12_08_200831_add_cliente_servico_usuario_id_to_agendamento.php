<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClienteServicoUsuarioIdToAgendamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agendamentos', function (Blueprint $table) {
            $table->bigInteger('id_servico')->unsigned()->nullable();
            $table->foreign('id_servico')->references('id_servico')->on('servicos');
            $table->bigInteger('id_cliente')->unsigned()->nullable();
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->bigInteger('id_executor')->unsigned()->nullable();
            $table->foreign('id_executor')->references('id_executor')->on('executores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agendamento', function (Blueprint $table) {

        });
    }
}
