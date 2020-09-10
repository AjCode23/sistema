<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->char('tipoProducto',1);
            $table->string('codigo')->nullable();
            $table->string('articulo');
            $table->string('descripcion')->nullable();;
            $table->string('path')->nullable();;
            $table->double('stock',20.2)->nullable();;
            $table->double('pvp',20.2)->nullable();;
            $table->char('status',1)->default(1);


            $table->foreign('categoria_id')->references('id')->on('categorias');
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
        Schema::dropIfExists('articulos');
    }
}
