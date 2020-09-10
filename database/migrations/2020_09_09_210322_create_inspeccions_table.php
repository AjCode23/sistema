<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspeccions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('data');
            $table->integer('ingreso_equipo_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('observacion')->nullable();
            $table->char('status',1)->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ingreso_equipo_id')->references('id')->on('ingreso_equipos');
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
        Schema::dropIfExists('inspeccions');
    }
}
