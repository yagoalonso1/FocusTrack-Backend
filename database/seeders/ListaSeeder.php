<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lista;

class ListaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 7 listas principales
        $listasPrincipales = Lista::factory(7)->create();

        // Crear 3 sublistas que serán hijas de las listas principales
        foreach ($listasPrincipales->take(3) as $listaPadre) {
            Lista::factory()->create([
                'id_padre' => $listaPadre->id_lista,
                'nombre' => 'Sublista de ' . $listaPadre->nombre,
            ]);
        }

        $this->command->info('✅ Creadas 10 listas (7 principales + 3 sublistas)');
    }
} 