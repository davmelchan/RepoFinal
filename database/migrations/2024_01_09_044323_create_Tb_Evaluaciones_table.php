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
        Schema::create('Tb_Evaluaciones', function (Blueprint $table) {
            $table->increments('IdEvaluacion');
            $table->string('Nombre', 50);
            $table->string('Descripcion', 100);
            $table->integer('IdUnidad');
            $table->integer('IdTipo');
            $table->string('IdGrupo');
            $table->dateTime('FechaCreacion');
            $table->boolean('Estado');
            $table->integer('Puntaje')->nullable();

            $table->primary(['IdEvaluacion'], 'PK_Tb_Evaluaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tb_Evaluaciones');
    }
};
