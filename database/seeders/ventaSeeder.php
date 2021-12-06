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
        $cat=New venta();
        $cat->id=1;
        $cat->Nro_v='V001';
        $cat->Fecha_v="2021-12-05 15:05:00";
        $cat->montoTotal=12.5;
        $cat->Id_us=2;
        $cat->save();
    }
}
