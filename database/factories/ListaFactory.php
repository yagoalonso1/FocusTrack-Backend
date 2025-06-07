<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lista>
 */
class ListaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tiposLista = [
            'Pedidos Pendientes',
            'Productos Favoritos', 
            'Lista de Deseos',
            'Compras Urgentes',
            'Regalos de Navidad',
            'Productos de Verano',
            'Artículos de Oficina',
            'Ropa Deportiva',
            'Accesorios',
            'Zapatos'
        ];

        return [
            'nombre' => fake()->randomElement($tiposLista),
            'descripcion' => fake()->optional(0.7)->sentence(10),
            'id_padre' => null, // Se establecerá después en el seeder para algunas listas
        ];
    }
} 