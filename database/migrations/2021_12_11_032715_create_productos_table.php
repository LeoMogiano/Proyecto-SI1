<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',40);
            $table->string('color',25);
            $table->float('precio');
            $table->float('costo');
            $table->integer('stock');
            $table->unsignedBigInteger('Id_categoria');                            //foranea
            $table->unsignedBigInteger('Id_modelo');                               //foranea
            $table->foreign('Id_categoria')->on ('categorias')->references('id'); //foranea
            $table->foreign('Id_modelo')->on ('modelos')->references('id'); //foranea
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
        Schema::dropIfExists('productos');
    }
}
