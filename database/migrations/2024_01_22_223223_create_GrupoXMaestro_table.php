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
        Schema::create('GrupoXMaestro', function (Blueprint $table) {
            $table->string('IdGrupo');
            $table->string('IdMaestro');
            $table->boolean('Estado');
            $table->increments('IdgrupoMaestro');

            $table->primary(['IdgrupoMaestro'], 'PK_GrupoXMaestro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('GrupoXMaestro');
    }
};
