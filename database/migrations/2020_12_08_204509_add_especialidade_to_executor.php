<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEspecialidadeToExecutor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('executores', function (Blueprint $table) {
            $table->bigInteger('id_especialidade')->unsigned()->nullable();
            $table->foreign('id_especialidade')->references('id_especialidade')->on('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('executor', function (Blueprint $table) {

        });
    }
}
