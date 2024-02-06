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
        Schema::table('ReportesTb', function (Blueprint $table) {
            $table->foreign(['IdAlumno'], 'FK_ReportesTb_Estudiante')->references(['Identificacion'])->on('Estudiante')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['IdMaestro'], 'FK_ReportesTb_Maestro')->references(['Identificacion'])->on('Maestro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ReportesTb', function (Blueprint $table) {
            $table->dropForeign('FK_ReportesTb_Estudiante');
            $table->dropForeign('FK_ReportesTb_Maestro');
        });
    }
};
