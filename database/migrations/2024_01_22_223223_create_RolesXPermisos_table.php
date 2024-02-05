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
        Schema::create('RolesXPermisos', function (Blueprint $table) {
            $table->increments('idRolesXPermisos');
            $table->integer('Permisos_Id');
            $table->integer('Roles_id');

            $table->primary(['idRolesXPermisos'], 'PK_RolesXPermisos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RolesXPermisos');
    }
};
