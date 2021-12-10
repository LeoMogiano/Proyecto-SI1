<?php

namespace Database\Seeders;

use App\Models\modelo;
use Illuminate\Database\Seeder;

class modeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $modelo=new modelo() ;
       $modelo->id=50;
       $modelo->nombre='A7X';
       $modelo->Id_marca=1001; 
       $modelo->save();//save con  parentesis
    }
}
