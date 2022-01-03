<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //userseeder es para guardar (o registrar una ) contraseña y correo cuando haces migraciones 
        $user=new User() ;
        $user->name='Admin';
        $user->email='admin@gmail.com';
        $user->password=bcrypt('12345');//bcrypt encripta la contraseña 
        $user->save();//save con  parentesis
        $user->assignRole('Administrador');//asigna un roll al  usuario que guardamos
        //CREAMOS UN CLIENTE
        $user=new User() ;
        $user->name='Cliente';
        $user->email='cliente@gmail.com';
        $user->password=bcrypt('54321');//bcrypt encripta la contraseña 
        $user->save();//save con  parentesis
        $user->assignRole('Cliente');//asigna un roll al  usuario que guardamos
        // VENDEDOR
        $user=new User() ;
        $user->name='Leo Mogiano';
        $user->email='mogi@gmail.com';
        $user->password=bcrypt('mogi123');//bcrypt encripta la contraseña 
        $user->save();//save con  parentesis
        $user->assignRole('Vendedor');//asigna un roll al  usuario que guardamos
    }
}
