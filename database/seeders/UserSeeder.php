<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario admin
        User::factory()->admin()->create([
            'nombre' => 'Admin',
            'apellido1' => 'Principal',
            'apellido2' => 'Sistema',
            'email' => 'admin@focustrack.com',
        ]);

        // Crear 10 usuarios normales
        User::factory(10)->create();

        $this->command->info('✅ Creados 11 usuarios (1 admin + 10 usuarios normales)');
    }
} 