<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('Nro_aut');
            $table->dateTime('Fecha_f');
            $table->integer('nit');
            $table->float('monTotal');
            $table->unsignedBigInteger('Id_venta');
            $table->foreign('Id_venta')->on ('ventas')->references('id'); //foranea 
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
        Schema::dropIfExists('facturas');
    }
}
