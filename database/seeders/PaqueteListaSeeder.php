<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaqueteLista;
use App\Models\Paquete;
use App\Models\Lista;

class PaqueteListaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar que existan paquetes y listas
        $paquetes = Paquete::all();
        $listas = Lista::all();

        if ($paquetes->isEmpty() || $listas->isEmpty()) {
            $this->command->warn('⚠️  No hay paquetes o listas disponibles. Ejecuta primero PaqueteSeeder y ListaSeeder.');
            return;
        }

        // Crear 10 relaciones paquete-lista únicas
        $relacionesCreadas = 0;
        $maxIntentos = 50; // Evitar bucle infinito
        $intentos = 0;

        while ($relacionesCreadas < 10 && $intentos < $maxIntentos) {
            try {
                PaqueteLista::factory()->create([
                    'id_paquete' => $paquetes->random()->id_paquete,
                    'id_lista' => $listas->random()->id_lista,
                ]);
                $relacionesCreadas++;
            } catch (\Exception $e) {
                // Si hay error por duplicado, continuar con el siguiente intento
            }
            $intentos++;
        }

        $this->command->info("✅ Creadas {$relacionesCreadas} relaciones paquete-lista");
    }
} 