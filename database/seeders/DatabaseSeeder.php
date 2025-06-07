<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Producto;
use App\Models\Paquete;
use App\Models\Lista;
use App\Models\ProductoPaquete;
use App\Models\PaqueteLista;
use App\Models\HistorialPaquetesPedido;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('🌱 Iniciando seeders de FocusTrack...');
        
        // Ejecutar todos los seeders en el orden correcto
        $this->call([
            UserSeeder::class,
            ProductoSeeder::class,
            PaqueteSeeder::class,
            ListaSeeder::class,
            ProductoPaqueteSeeder::class,
            PaqueteListaSeeder::class,
            HistorialPaquetesPedidoSeeder::class,
        ]);

        $this->command->info('🎉 ¡Todos los seeders ejecutados exitosamente!');
        $this->command->info('📊 Base de datos poblada con datos de prueba para FocusTrack');
    }
}
