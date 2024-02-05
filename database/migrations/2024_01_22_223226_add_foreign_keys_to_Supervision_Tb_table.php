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
        Schema::table('Supervision_Tb', function (Blueprint $table) {
            $table->foreign(['idEstudiante'], 'FK_Supervision_Tb_Estudiante')->references(['Identificacion'])->on('Estudiante')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idDocente'], 'FK_Supervision_Tb_Maestro')->references(['Identificacion'])->on('Maestro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idEmpresa'], 'FK_Supervision_Tb_Tb_empresa')->references(['IdEmpresa'])->on('Tb_empresa')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['IdTipoSupervision'], 'FK_Supervision_Tb_Cat_supervision')->references(['IdCatSupervision'])->on('Cat_supervision')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Supervision_Tb', function (Blueprint $table) {
            $table->dropForeign('FK_Supervision_Tb_Estudiante');
            $table->dropForeign('FK_Supervision_Tb_Maestro');
            $table->dropForeign('FK_Supervision_Tb_Tb_empresa');
            $table->dropForeign('FK_Supervision_Tb_Cat_supervision');
        });
    }
};
