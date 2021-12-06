<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=> 'Administrador']);
        $role2 = Role::create(['name'=> 'Cliente']);
        Permission::create(['name' => 'gestionar usuario'])->syncRoles([$role1]);//syncRoles asigna a varios roles
        Permission::create(['name' => 'gestionar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar reserva'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar inventario'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar orden de compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar cotizacion'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar factura'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestionar categoria'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'crear categoria'])->syncRoles([$role1]);
        //
    }
}
