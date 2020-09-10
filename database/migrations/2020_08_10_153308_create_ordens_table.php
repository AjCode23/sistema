<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('condicion_id')->unsigned();
            $table->integer('asesor_id')->unsigned()->nulable();
            $table->date('fecha');
            $table->double('impuesto',3.2);
            $table->string('serie')->nulable();
            $table->string('comentario')->nulable();
            $table->char('status',1)->default(1);

            $table->foreign('asesor_id')->references('id')->on('asesors');
            $table->foreign('condicion_id')->references('id')->on('condicion_pagos');
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
        Schema::dropIfExists('ordens');
    }
}
