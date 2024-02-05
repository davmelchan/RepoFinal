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
        Schema::table('RolesXPermisos', function (Blueprint $table) {
            $table->foreign(['Permisos_Id'], 'FK_RolesXPermisos_Permisos')->references(['Id'])->on('Permisos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Roles_id'], 'FK_RolesXPermisos_Roles')->references(['IdRol'])->on('Roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('RolesXPermisos', function (Blueprint $table) {
            $table->dropForeign('FK_RolesXPermisos_Permisos');
            $table->dropForeign('FK_RolesXPermisos_Roles');
        });
    }
};
