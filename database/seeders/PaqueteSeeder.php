<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paquete;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 10 paquetes
        Paquete::factory(10)->create();

        $this->command->info('✅ Creados 10 paquetes');
    }
} 