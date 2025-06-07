<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 10 productos
        Producto::factory(10)->create();

        $this->command->info('✅ Creados 10 productos');
    }
} 