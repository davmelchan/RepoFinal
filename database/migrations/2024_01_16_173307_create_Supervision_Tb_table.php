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
        Schema::create('Supervision_Tb', function (Blueprint $table) {
            $table->increments('idSupervision');
            $table->string('idEstudiante');
            $table->string('idDocente');
            $table->integer('idEmpresa');
            $table->dateTime('FechaSupervision');
            $table->text('Observacion');
            $table->boolean('Estado');
            $table->integer('IdTipoSupervision');

            $table->primary(['idSupervision'], 'PK_Supervision_Tb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Supervision_Tb');
    }
};
