<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat__empleados', function (Blueprint $table) {
            $table->increments('id_empleados');
            $table->unsignedInteger('agencia_id');
            $table->foreign('agencia_id')->references('id_agencia')->on('agencias');
            $table->unsignedInteger('empleado_id');
            $table->foreign('empleado_id')->references('id_empleado')->on('empleados');
            $table->string('RPE');
            $table->string('Nombre');
            $table->date('FechaIngreso');
            $table->string('Contrato');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat__empleados');
    }
}
