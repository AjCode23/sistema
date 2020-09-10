<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa');
            $table->string('tipo_documento',10);
            $table->string('num_documento',50);
            $table->string('direccion');
            $table->string('email');
            $table->string('telefono');
            $table->string('path')->nullable();
            $table->string('ciudad');
            $table->string('moneda');
            $table->string('simbolo');
            $table->string('nombre_impuesto');
            $table->string('monto_inpuesto');
            $table->char('status',1)->default(1);
            
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
        Schema::dropIfExists('configs');
    }
}
