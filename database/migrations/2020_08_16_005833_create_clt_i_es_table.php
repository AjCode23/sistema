<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCltIEsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clt_i_es', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->double('activo',10.2);
            $table->double('pasivo',10.2);
            $table->double('patrimonio',10.2);
            $table->double('ingreso',10.2);
            $table->double('egreso',10.2);
            $table->double('otros',10.2);
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
        Schema::dropIfExists('clt_i_es');
    }
}
