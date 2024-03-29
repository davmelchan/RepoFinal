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
        Schema::table('Maestro', function (Blueprint $table) {
            $table->foreign(['Identificacion'], 'FK_Maestro_Usuario')->references(['Identificacion'])->on('usuario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idGenero'], 'FK_Maestro_Tb_genero')->references(['IdGenero'])->on('Tb_genero')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Maestro', function (Blueprint $table) {
            $table->dropForeign('FK_Maestro_Usuario');
            $table->dropForeign('FK_Maestro_Tb_genero');
        });
    }
};
