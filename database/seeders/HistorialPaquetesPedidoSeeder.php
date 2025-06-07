<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HistorialPaquetesPedido;
use App\Models\Paquete;

class HistorialPaquetesPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar que existan paquetes
        $paquetes = Paquete::all();

        if ($paquetes->isEmpty()) {
            $this->command->warn('⚠️  No hay paquetes disponibles. Ejecuta primero PaqueteSeeder.');
            return;
        }

        // Crear 10 registros de historial
        for ($i = 0; $i < 10; $i++) {
            HistorialPaquetesPedido::factory()->create([
                'id_paquete' => $paquetes->random()->id_paquete,
            ]);
        }

        $this->command->info('✅ Creados 10 registros de historial de paquetes');
    }
} 