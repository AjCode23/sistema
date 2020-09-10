<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCltRegimensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clt_regimens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('regimen');
            $table->string('resolucion')->nullable();
            $table->string('ciu')->nullable();
            $table->integer('cliente_id')->unsigned();
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
        Schema::dropIfExists('clt_regimens');
    }
}
