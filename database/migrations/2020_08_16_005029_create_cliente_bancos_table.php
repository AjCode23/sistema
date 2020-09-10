<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteBancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_bancos', function (Blueprint $table) {
            $table->increments('id');
           
            $table->string('banco');
            $table->integer('cliente_id')->unsigned();
            $table->string('cuenta');
            $table->string('tipo_cuenta');
            $table->char('status',1)->default(1);


            $table->foreign('cliente_id')->references('id')->on('clientes');
           
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
        Schema::dropIfExists('cliente_bancos');
    }
}
