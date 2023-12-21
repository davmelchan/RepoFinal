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
        Schema::create('Tb_empresa', function (Blueprint $table) {
            $table->increments('IdEmpresa');
            $table->string('Nombre', 50);
            $table->text('Descripcion');
            $table->string('Responsable', 50);
            $table->boolean('Estado');

            $table->primary(['IdEmpresa'], 'PK_Tb_empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tb_empresa');
    }
};
