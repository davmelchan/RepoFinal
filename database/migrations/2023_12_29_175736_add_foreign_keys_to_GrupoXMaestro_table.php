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
        Schema::table('GrupoXMaestro', function (Blueprint $table) {
            $table->foreign(['IdMaestro'], 'FK_GrupoXMaestro_Maestro')->references(['Identificacion'])->on('Maestro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['IdGrupo'], 'FK_GrupoXMaestro_Tb_Grupo')->references(['IdGrupo'])->on('Tb_Grupo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('GrupoXMaestro', function (Blueprint $table) {
            $table->dropForeign('FK_GrupoXMaestro_Maestro');
            $table->dropForeign('FK_GrupoXMaestro_Tb_Grupo');
        });
    }
};
