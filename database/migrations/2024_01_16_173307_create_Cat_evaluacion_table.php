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
        Schema::create('Cat_evaluacion', function (Blueprint $table) {
            $table->increments('IdCatEvaluacion');
            $table->string('Nombre', 50);
            $table->boolean('Estado');

            $table->primary(['IdCatEvaluacion'], 'PK_Cat_evaluacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cat_evaluacion');
    }
};
