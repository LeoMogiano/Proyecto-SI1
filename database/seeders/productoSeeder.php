<?php

namespace Database\Seeders;

use App\Models\producto;
use Illuminate\Database\Seeder;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $producto=new producto() ;
       $producto->id=20;
       $producto->nombre='Videoportero';
       $producto->color='marron'; 
       $producto->precio=350;
       $producto->costo=250;
       $producto->stock=15; 
       $producto->Id_categoria=11; 
       $producto->Id_modelo=50; 
       $producto->save();//save con  parentesis
    }
}
