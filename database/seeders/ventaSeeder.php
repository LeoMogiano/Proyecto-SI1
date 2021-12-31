<?php

namespace Database\Seeders;

use App\Models\venta;
use Illuminate\Database\Seeder;

class ventaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        $venta=New venta();
        $venta->id=1;
       /*  $venta->Nro_v='V001'; */
        $venta->Fecha_v="2021-12-05 15:05:00";
        $venta->longitud="-17.795482958139004";
        $venta->latitud="-63.177053288330086";
        $venta->montoTotal=0;
        $venta->Id_us=2;
        $venta->save();
    }
}
