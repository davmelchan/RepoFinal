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
        Schema::table('ProcesoXPermiso', function (Blueprint $table) {
            $table->foreign(['Proceso_Id'], 'FK_ProcesoXPermiso_Procesos')->references(['IdProceso'])->on('Procesos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Permiso_Id'], 'FK_ProcesoXPermiso_Permisos')->references(['Id'])->on('Permisos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ProcesoXPermiso', function (Blueprint $table) {
            $table->dropForeign('FK_ProcesoXPermiso_Procesos');
            $table->dropForeign('FK_ProcesoXPermiso_Permisos');
        });
    }
};
