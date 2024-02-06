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
        Schema::create('Procesos', function (Blueprint $table) {
            $table->increments('IdProceso');
            $table->text('NombreProceso');
            $table->text('Ruta');

            $table->primary(['IdProceso'], 'PK_Procesos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Procesos');
    }
};
