<?php

namespace Database\Seeders;

use App\Models\compra;
use Illuminate\Database\Seeder;

class compraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $compra=New compra();
        $compra->id=1;
        /* $compra->Nro_c='C001'; */
        $compra->Fecha_c="2021-12-05 20:05:00";
        $compra->costoTotal=320.2;
        $compra->Id_prov=70;
        $compra->save();
    }
}
