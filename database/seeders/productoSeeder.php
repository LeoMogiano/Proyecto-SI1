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
       $producto->nombre='VideoPortero';
       $producto->color='Marron'; 
       $producto->precio=350;
       $producto->costo=250;
       $producto->stock=15; 
       $producto->url='https://ae01.alicdn.com/kf/H06ca0c7ccc5e4d929dcdfcd9430b707cj.jpg_350x350.jpg';
       $producto->Id_categoria=11; 
       $producto->Id_modelo=50; 
       $producto->save();//save con  parentesis

       $producto=new producto() ;
       $producto->id=21;
       $producto->nombre='Camara';
       $producto->color='Blanco'; 
       $producto->precio=120;
       $producto->costo=50;
       $producto->stock=20; 
       $producto->url='https://commax.com.ar/wp-content/uploads/2018/09/intercomunicadores-ondaport-350x350.png';
       $producto->Id_categoria=12; 
       $producto->Id_modelo=51; 
       $producto->save();

       $producto=new producto() ;
       $producto->id=22;
       $producto->nombre='InterComunicador';
       $producto->color='Plata'; 
       $producto->precio=1200;
       $producto->costo=500;
       $producto->stock=10; 
       $producto->url='https://commax.com.ar/wp-content/uploads/2018/09/intercomunicadores-ondaport-350x350.png';
       $producto->Id_categoria=10; 
       $producto->Id_modelo=52; 
       $producto->save();
    }
}
