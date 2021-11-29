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
        $c = new categoria();
        $c->nombre='Accesorios de Domótica';
        $c->save();
        $c = new categoria();
        $c->nombre='VideoPortero';
        $c->save();
    }
}
