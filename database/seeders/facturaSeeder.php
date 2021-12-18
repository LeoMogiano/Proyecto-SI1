<?php

namespace Database\Seeders;

use App\Models\factura;
use Illuminate\Database\Seeder;

class facturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factura=New factura();
        $factura->id=1;
        $factura->Nro_aut=3000;
        $factura->Fecha_f="2021-12-05 20:05:00";
        $factura->nit=6287905;
        $factura->monTotal=4320.2;
        $factura->Id_venta=1;
        $factura->save();
    }
}
