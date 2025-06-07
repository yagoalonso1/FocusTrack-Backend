<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductoPaquete;
use App\Models\Producto;
use App\Models\Paquete;

class ProductoPaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar que existan productos y paquetes
        $productos = Producto::all();
        $paquetes = Paquete::all();

        if ($productos->isEmpty() || $paquetes->isEmpty()) {
            $this->command->warn('⚠️  No hay productos o paquetes disponibles. Ejecuta primero ProductoSeeder y PaqueteSeeder.');
            return;
        }

        // Crear 10 relaciones producto-paquete únicas
        $relacionesCreadas = 0;
        $maxIntentos = 50; // Evitar bucle infinito
        $intentos = 0;

        while ($relacionesCreadas < 10 && $intentos < $maxIntentos) {
            try {
                ProductoPaquete::factory()->create([
                    'id_producto' => $productos->random()->id_producto,
                    'id_paquete' => $paquetes->random()->id_paquete,
                ]);
                $relacionesCreadas++;
            } catch (\Exception $e) {
                // Si hay error por duplicado, continuar con el siguiente intento
            }
            $intentos++;
        }

        $this->command->info("✅ Creadas {$relacionesCreadas} relaciones producto-paquete");
    }
} 