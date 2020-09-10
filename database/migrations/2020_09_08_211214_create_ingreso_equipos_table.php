<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('articulo_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->string('marca');
            $table->string('modelo');
            $table->string('descripcion');
            $table->string('numero');
            $table->string('observaciones')->nullable();
            $table->char('status',1)->default(1);
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('articulo_id')->references('id')->on('articulos');
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
        Schema::dropIfExists('ingreso_equipos');
    }
}
