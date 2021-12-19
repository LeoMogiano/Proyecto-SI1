<?php

namespace Database\Seeders;

use App\Models\servicio;
use Illuminate\Database\Seeder;

class servicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicio=new servicio() ;
        $servicio->id=900;
        $servicio->descripción='Servicio a Domicilio';
        $servicio->precio=150;
        $servicio->Id_tp=400;
        $servicio->save();//save con  parentesis
    }
}
