<?php

namespace Database\Seeders;

use App\Models\categoria;
use Illuminate\Database\Seeder;

class categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat=New categoria();
        $cat->id=10;
        $cat->nombre='Accesorios de Domótica';
        $cat->save();

        $cat=New categoria();
        $cat->id=11;
        $cat->nombre='Cerraduras';
        $cat->save();
        
        $cat=New categoria();
        $cat->id=12;
        $cat->nombre='Cámara de Seguridad';
        $cat->save();
    }
}
