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
        Schema::create('Tb_genero', function (Blueprint $table) {
            $table->increments('IdGenero');
            $table->string('Nombre', 50);
            $table->boolean('Estado');

            $table->primary(['IdGenero'], 'PK_Tb_genero');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tb_genero');
    }
};
