<?php

namespace Database\Seeders;

use App\Models\proveedor;
use Illuminate\Database\Seeder;

class proveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proveedors=new proveedor() ;
        $proveedors->id=70;
        $proveedors->nombre='Logitech';
        $proveedors->email='logitech@gmail.com';
        $proveedors->ubicación='Av.Paragua Radial 23 #340'; 
        $proveedors->tiempoEstimado='La empresa logitech suele tardar dos dias en la llegada de sus productos';
        $proveedors->save();//save con  parentesis
    }
}
