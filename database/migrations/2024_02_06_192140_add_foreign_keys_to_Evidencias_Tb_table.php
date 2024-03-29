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
        Schema::table('Evidencias_Tb', function (Blueprint $table) {
            $table->foreign(['idEmpresa'], 'FK_Evidencias_Tb_Tb_empresa')->references(['IdEmpresa'])->on('Tb_empresa')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Evidencias_Tb', function (Blueprint $table) {
            $table->dropForeign('FK_Evidencias_Tb_Tb_empresa');
        });
    }
};
