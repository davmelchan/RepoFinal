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
        Schema::table('EvaluacionXNotas', function (Blueprint $table) {
            $table->foreign(['idEvaluacion'], 'FK_EvaluacionXNotas_Tb_Evaluaciones')->references(['IdEvaluacion'])->on('Tb_Evaluaciones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idEstudiante'], 'FK_EvaluacionXNotas_Estudiante')->references(['Identificacion'])->on('Estudiante')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('EvaluacionXNotas', function (Blueprint $table) {
            $table->dropForeign('FK_EvaluacionXNotas_Tb_Evaluaciones');
            $table->dropForeign('FK_EvaluacionXNotas_Estudiante');
        });
    }
};
