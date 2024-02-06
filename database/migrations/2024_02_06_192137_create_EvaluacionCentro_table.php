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
        Schema::create('EvaluacionCentro', function (Blueprint $table) {
            $table->increments('idEvaluacionCentro');
            $table->string('IdEstudiante');
            $table->string('IdMaestro');
            $table->integer('IdEmpresa');
            $table->date('FechaInicio');
            $table->date('FechaFinal');
            $table->integer('Nota');

            $table->primary(['idEvaluacionCentro'], 'PK_EvaluacionCentro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EvaluacionCentro');
    }
};
