<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('articulo_id')->unsigned();
            $table->integer('orden_id')->unsigned()->nullable();
            $table->double('cantidad',10.2);
            $table->double('pvp',30.2);
            $table->double('descuento',3.2);
            $table->char('status',1)->default(1);

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('orden_id')->references('id')->on('ordens');
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
        Schema::dropIfExists('cotizacions');
    }
}
