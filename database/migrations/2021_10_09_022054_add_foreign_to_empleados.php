<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            
            $table->unsignedInteger('Id_empleado_F');
            $table->foreign('Id_empleado_F')->references('id')->on('empleados');

            $table->unsignedInteger('Id_rol_F');
            $table->foreign('Id_rol_F')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropForeign(['Id_empleado_F']);
            $table->dropColumn('Id_empleado_F');

            $table->dropForeign(['Id_rol_F']);
            $table->dropColumn('Id_rol_F');

            
        });
    }
}
