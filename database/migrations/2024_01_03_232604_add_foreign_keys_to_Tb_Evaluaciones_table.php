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
        Schema::table('Tb_Evaluaciones', function (Blueprint $table) {
            $table->foreign(['IdTipo'], 'FK_Tb_Evaluaciones_Cat_evaluacion')->references(['IdCatEvaluacion'])->on('Cat_evaluacion')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['IdGrupo'], 'FK_Tb_Evaluaciones_Grupos')->references(['Identificacion'])->on('Grupos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['IdUnidad'], 'FK_Tb_Evaluaciones_Tb_unidad')->references(['IdUnidad'])->on('Tb_unidad')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Tb_Evaluaciones', function (Blueprint $table) {
            $table->dropForeign('FK_Tb_Evaluaciones_Cat_evaluacion');
            $table->dropForeign('FK_Tb_Evaluaciones_Grupos');
            $table->dropForeign('FK_Tb_Evaluaciones_Tb_unidad');
        });
    }
};
