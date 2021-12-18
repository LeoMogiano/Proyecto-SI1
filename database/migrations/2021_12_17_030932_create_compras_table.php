<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            /* $table->string('Nro_c'); */
            $table->dateTime('Fecha_c');
            $table->float('costoTotal');
            $table->unsignedBigInteger('Id_prov');
            $table->foreign('Id_prov')->on ('proveedores')->references('id'); //foranea 
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
        Schema::dropIfExists('compras');
    }
}
