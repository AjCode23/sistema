<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asesor_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('tipoPersona')->nullable();
            $table->string('nombres');
            $table->string('tipoDocumento');
            $table->string('numDocumento');
            $table->string('actPpal');
            $table->string('email');
            $table->char('status',1)->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('asesor_id')->references('id')->on('asesors');
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
        Schema::dropIfExists('clientes');
    }
}
