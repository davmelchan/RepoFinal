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
        Schema::create('Tb_Grupo', function (Blueprint $table) {
            $table->string('IdGrupo', 10);
            $table->string('Nombre', 250);
            $table->boolean('Estado');
            $table->text('RutaImagen');

            $table->primary(['IdGrupo'], 'PK_Tb_Grupo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tb_Grupo');
    }
};
