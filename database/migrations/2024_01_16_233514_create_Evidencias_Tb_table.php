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
        Schema::create('Evidencias_Tb', function (Blueprint $table) {
            $table->increments('idEvidencia');
            $table->string('Nombre');
            $table->text('Descripcion');
            $table->integer('idEmpresa');
            $table->date('Fecha');
            $table->text('RutaArchivo');
            $table->boolean('Estado');
            $table->text('NombreArchivo');

            $table->primary(['idEvidencia'], 'PK_Evidencias_Tb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Evidencias_Tb');
    }
};
