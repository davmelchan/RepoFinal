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
            $table->string('primerNombre', 50);
            $table->string('segundoNombre', 50);
            $table->string('apellidoMaterno', 50);
            $table->string('apellidoPaterno', 50);
            $table->text('direccion');
            $table->integer('idGenero');
            $table->integer('idEmpresa');
            $table->integer('idGrupo');
            $table->text('rutaImagen')->nullable();
            $table->char('Estado', 10);
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
