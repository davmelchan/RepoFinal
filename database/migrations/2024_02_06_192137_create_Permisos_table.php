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
        Schema::create('Permisos', function (Blueprint $table) {
            $table->increments('Id');
            $table->text('NombrePermiso');
            $table->text('Ruta');
            $table->text('Icono');
            $table->string('Titulo', 500)->nullable();
            $table->text('page')->nullable();

            $table->primary(['Id'], 'PK_Permisos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Permisos');
    }
};
