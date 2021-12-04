<?php

namespace Database\Seeders;

use App\Models\tipoServicio;
use Illuminate\Database\Seeder;

class TipoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TipoServicioSeeder es para guardas la base raiz 
        $tiposervicio=new TipoServicio() ;
        $tiposervicio->id=400;
        $tiposervicio->nombre='Instalación';
        $tiposervicio->descripción='Servicio a Domicilio';  
        $tiposervicio->save();//save con  parentesis

        $tiposervicio=new TipoServicio() ;
        $tiposervicio->id=401;
        $tiposervicio->nombre='Mantenimiento';
        $tiposervicio->descripción='Servicio a Domicilio';  
        $tiposervicio->save();

        $tiposervicio=new TipoServicio() ;
        $tiposervicio->id=402;
        $tiposervicio->nombre='Reparación';
        $tiposervicio->descripción='Servicio a Domicilio';  
        $tiposervicio->save();
      
    }
}
