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
        Schema::table('EvaluacionesXMaestro', function (Blueprint $table) {
            $table->foreign(['IdEvaluacion'], 'FK_EvaluacionesXMaestro_Tb_Evaluaciones')->references(['IdEvaluacion'])->on('Tb_Evaluaciones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['MaestroId'], 'FK_EvaluacionesXMaestro_Maestro')->references(['Identificacion'])->on('Maestro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('EvaluacionesXMaestro', function (Blueprint $table) {
            $table->dropForeign('FK_EvaluacionesXMaestro_Tb_Evaluaciones');
            $table->dropForeign('FK_EvaluacionesXMaestro_Maestro');
        });
    }
};
