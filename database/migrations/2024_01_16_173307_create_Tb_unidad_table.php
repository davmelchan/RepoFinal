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
        Schema::create('Tb_unidad', function (Blueprint $table) {
            $table->increments('IdUnidad');
            $table->string('Nombre', 50);
            $table->boolean('Estado');

            $table->primary(['IdUnidad'], 'PK_Tb_unidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tb_unidad');
    }
};
