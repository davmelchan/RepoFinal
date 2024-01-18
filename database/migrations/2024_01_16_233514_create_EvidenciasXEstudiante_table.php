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
        Schema::create('EvidenciasXEstudiante', function (Blueprint $table) {
            $table->increments('IdEvidenciaXEstudiante');
            $table->integer('idEvidencia');
            $table->string('idEstudiante');
            $table->boolean('Estado');

            $table->primary(['IdEvidenciaXEstudiante'], 'PK_EvidenciasXEstudiante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EvidenciasXEstudiante');
    }
};
