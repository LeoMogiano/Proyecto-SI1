<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_venta', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->float('precio_tot');
            $table->float('descuento');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->on('productos')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('venta_productos');
    }
}
