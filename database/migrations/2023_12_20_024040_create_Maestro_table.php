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
        Schema::create('Maestro', function (Blueprint $table) {
            $table->string('Identificacion');
            $table->text('primerNombre');
            $table->text('segundoNombre');
            $table->text('apellidoPaterno');
            $table->text('apellidoMaterno');
            $table->text('especialidad');
            $table->integer('idGenero');
            $table->text('FotoRuta');

            $table->primary(['Identificacion'], 'PK_Maestro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Maestro');
    }
};
