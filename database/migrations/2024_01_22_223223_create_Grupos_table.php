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
        Schema::create('Grupos', function (Blueprint $table) {
            $table->string('Identificacion');
            $table->string('Nombre', 50);
            $table->text('RutaImagen')->nullable();
            $table->boolean('Estado');

            $table->primary(['Identificacion'], 'PK_Grupos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Grupos');
    }
};
