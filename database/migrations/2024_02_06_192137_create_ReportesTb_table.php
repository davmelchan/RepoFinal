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
        Schema::create('ReportesTb', function (Blueprint $table) {
            $table->increments('IdReporte');
            $table->string('IdAlumno');
            $table->string('IdMaestro');
            $table->string('HoraEntrada', 100);
            $table->string('HoraSalida', 100);
            $table->text('Observacion');
            $table->string('Area', 200);
            $table->string('RolAsignado', 200);

            $table->primary(['IdReporte'], 'PK_ReportesTb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ReportesTb');
    }
};
