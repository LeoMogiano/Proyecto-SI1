<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->float('precio_tot');
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('servicio_id')->on('servicios')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('venta_id');
            $table->foreign('venta_id')->on('ventas')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('servicio_ventas');
    }
}
