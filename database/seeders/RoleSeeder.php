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
        $role3 = Role::create(['name'=> 'Vendedor']);
        

        Permission::create(['name' => 'Gestionar Perfil'])->syncRoles([$role1,$role3]);

        Permission::create(['name' => 'Gestionar Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'Gestionar Bitacora'])->syncRoles([$role1,$role3]);//syncRoles asigna a varios roles
        Permission::create(['name' => 'Gestionar Roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'Gestionar Compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'Gestionar Proveedores'])->syncRoles([$role1]);

        Permission::create(['name' => 'Gestionar NotaVenta'])->syncRoles([$role1]);
        Permission::create(['name' => 'Gestionar Facturas'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'Gestionar Servicios'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'Gestionar TipoServicios'])->syncRoles([$role1,$role3]);
        
        Permission::create(['name' => 'Gestionar Categorias'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'Gestionar Marcas'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'Gestionar Modelos'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'Gestionar Productos'])->syncRoles([$role1,$role3]);
    

       /*  Permission::create(['name' => 'Modo Admin'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modo Cliente'])->syncRoles([$role2]); */
        Permission::create(['name' => 'Dashboard'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'Session'])->syncRoles([$role1,$role2,$role3]);
                //admin
        //
        //
        
    }
}
