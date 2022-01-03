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
        $servicio->url='http://www.electronicasi.com/wp-content/uploads/2019/06/portada-camaras-seguridad-e1559641520766-565x350.jpg';
        $servicio->Id_tp=400;
        $servicio->save();//save con  parentesis

        $servicio=new servicio() ;
        $servicio->id=901;
        $servicio->descripción='Servicio a Domicilio';
        $servicio->precio=150;
        $servicio->url='https://ingenieriayeficiencia.com/wp-content/uploads/2017/08/mantenimiento_en_sistemas_de_seguridad-03.png';
        $servicio->Id_tp=401;
        $servicio->save();

        $servicio=new servicio() ;
        $servicio->id=902;
        $servicio->descripción='Servicio a Domicilio';
        $servicio->precio=150;
        $servicio->url='https://www.tecnoseguro.com/media/k2/items/cache/9e742c00b6831ce5ef1ecffa26793251_XL.jpg';
        $servicio->Id_tp=402;
        $servicio->save();
    }
}
