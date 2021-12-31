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

       $modelo=new modelo() ;
       $modelo->id=51;
       $modelo->nombre='AXS';
       $modelo->Id_marca=1001; 
       $modelo->save();
//-------------------------------
       $modelo=new modelo() ;
       $modelo->id=52;
       $modelo->nombre='C100B2LC';
       $modelo->Id_marca=1002; 
       $modelo->save();

       $modelo=new modelo() ;
       $modelo->id=53;
       $modelo->nombre='SKW801T';
       $modelo->Id_marca=1002; 
       $modelo->save();
//-------------------------------
       $modelo=new modelo() ;
       $modelo->id=54;
       $modelo->nombre='GR500';
       $modelo->Id_marca=1003; 
       $modelo->save();

       $modelo=new modelo() ;
       $modelo->id=55;
       $modelo->nombre='K200B3';
       $modelo->Id_marca=1003; 
       $modelo->save();
//-------------------------------
       $modelo=new modelo() ;
       $modelo->id=56;
       $modelo->nombre='E5C';
       $modelo->Id_marca=1004; 
       $modelo->save();

       $modelo=new modelo() ;
       $modelo->id=57;
       $modelo->nombre='A2C';
       $modelo->Id_marca=1004; 
       $modelo->save();

    }
}
