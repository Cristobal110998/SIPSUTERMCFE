<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisiones', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('Nombre');
            $table->text('Descripcion');
            $table->string('Codigo');
            $table->timestamps();

            $table->bigInteger('nombreClave');
            $table->foreign('nombreClave')->references('id')->on('zonas')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisiones');
    }
}
