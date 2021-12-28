<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_compras', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->float('precio_tot');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->on('productos')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('compra_id');
            $table->foreign('compra_id')->on('compras')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('producto_compras');
    }
}
