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
        Schema::create('Cat_supervision', function (Blueprint $table) {
            $table->increments('IdCatSupervision');
            $table->string('Nombre', 50);
            $table->boolean('Estado');

            $table->primary(['IdCatSupervision'], 'PK_Cat_supervision');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cat_supervision');
    }
};
