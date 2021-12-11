<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(categoriaSeeder::class);
        $this->call(marcaSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(userSeeder::class);
        $this->call(TipoServicioSeeder::class);
        $this->call(proveedorSeeder::class);
        $this->call(ventaSeeder::class);
        $this->call(modeloSeeder::class);
        $this->call(productoSeeder::class);
    }
}
