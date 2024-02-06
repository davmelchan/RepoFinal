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
        Schema::create('EvaluacionXNotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idEstudiante');
            $table->integer('idEvaluacion');
            $table->integer('nota');

            $table->primary(['id'], 'PK_EvaluacionXNotas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EvaluacionXNotas');
    }
};
