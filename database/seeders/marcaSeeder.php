<?php

namespace Database\Seeders;

use App\Models\marca;
use Illuminate\Database\Seeder;

class marcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marc=New marca();
        $marc->id=1001;
        $marc->nombre='LOCPRO';
        $marc->save();

        $marc=New marca();
        $marc->id=1002;
        $marc->nombre='KLOC';
        $marc->save();
        
        $marc=New marca();
        $marc->id=1003;
        $marc->nombre='AHUA';
        $marc->save();

        $marc=New marca();
        $marc->id=1004;
        $marc->nombre='SHP';
        $marc->save();

    }
}
