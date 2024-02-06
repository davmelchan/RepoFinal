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
        Schema::create('ProcesoXPermiso', function (Blueprint $table) {
            $table->increments('IdProcesoXPermiso');
            $table->integer('Proceso_Id');
            $table->integer('Permiso_Id');

            $table->primary(['IdProcesoXPermiso'], 'PK_ProcesoXPermiso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ProcesoXPermiso');
    }
};
