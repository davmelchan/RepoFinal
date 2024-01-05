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
        Schema::create('EvaluacionesXMaestro', function (Blueprint $table) {
            $table->increments('idEvaluacionXMaestro');
            $table->integer('IdEvaluacion');
            $table->string('MaestroId');
            $table->boolean('Estado');

            $table->primary(['idEvaluacionXMaestro'], 'PK_EvaluacionesXMaestro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EvaluacionesXMaestro');
    }
};
