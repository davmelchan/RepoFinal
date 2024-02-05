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
        Schema::create('GrupoTb', function (Blueprint $table) {
            $table->string('IdGrupo');
            $table->string('Nombre', 250);
            $table->boolean('Estado');
            $table->text('RutaImagen')->nullable();

            $table->primary(['IdGrupo'], 'PK_GrupoTb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('GrupoTb');
    }
};
