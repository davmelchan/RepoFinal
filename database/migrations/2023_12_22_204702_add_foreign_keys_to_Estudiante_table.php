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
        Schema::table('Estudiante', function (Blueprint $table) {
            $table->foreign(['idGenero'], 'FK_Estudiante_Tb_genero')->references(['IdGenero'])->on('Tb_genero')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Estudiante', function (Blueprint $table) {
            $table->dropForeign('FK_Estudiante_Tb_genero');
        });
    }
};
