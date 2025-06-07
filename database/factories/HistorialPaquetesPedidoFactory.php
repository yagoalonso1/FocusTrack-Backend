<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paquete;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HistorialPaquetesPedido>
 */
class HistorialPaquetesPedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $estados = ['pendiente', 'en_transito', 'en_reparto', 'entregado', 'devuelto', 'perdido'];

        return [
            'id_paquete' => Paquete::factory(),
            'estado' => fake()->randomElement($estados),
            'fecha' => fake()->dateTimeBetween('-60 days', 'now'),
        ];
    }
} 