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
        Schema::table('EvidenciasXEstudiante', function (Blueprint $table) {
            $table->foreign(['idEstudiante'], 'FK_EvidenciasXEstudiante_Estudiante')->references(['Identificacion'])->on('Estudiante')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idEvidencia'], 'FK_EvidenciasXEstudiante_Evidencias_Tb')->references(['idEvidencia'])->on('Evidencias_Tb')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('EvidenciasXEstudiante', function (Blueprint $table) {
            $table->dropForeign('FK_EvidenciasXEstudiante_Estudiante');
            $table->dropForeign('FK_EvidenciasXEstudiante_Evidencias_Tb');
        });
    }
};
