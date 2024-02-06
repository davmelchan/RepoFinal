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
        Schema::table('EvaluacionCentro', function (Blueprint $table) {
            $table->foreign(['IdEstudiante'], 'FK_EvaluacionCentro_Estudiante')->references(['Identificacion'])->on('Estudiante')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['IdMaestro'], 'FK_EvaluacionCentro_Maestro')->references(['Identificacion'])->on('Maestro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['IdEmpresa'], 'FK_EvaluacionCentro_Tb_empresa')->references(['IdEmpresa'])->on('Tb_empresa')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('EvaluacionCentro', function (Blueprint $table) {
            $table->dropForeign('FK_EvaluacionCentro_Estudiante');
            $table->dropForeign('FK_EvaluacionCentro_Maestro');
            $table->dropForeign('FK_EvaluacionCentro_Tb_empresa');
        });
    }
};
