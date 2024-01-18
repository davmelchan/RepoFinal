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
        Schema::create('Estudiante', function (Blueprint $table) {
            $table->string('Identificacion');
            $table->string('Nombres', 50);
            $table->string('Apellidos', 50);
            $table->text('Direccion');
            $table->integer('idGenero');
            $table->integer('idEmpresa')->nullable();
            $table->string('idGrupo')->nullable();
            $table->text('rutaImagen')->nullable();
            $table->char('Estado', 10);
            $table->string('Telefono', 9);

            $table->primary(['Identificacion'], 'PK_Estudiante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Estudiante');
    }
};
