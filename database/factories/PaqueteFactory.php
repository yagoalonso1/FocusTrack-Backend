<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paquete>
 */
class PaqueteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $estados = ['pendiente', 'en_transito', 'en_reparto', 'entregado', 'devuelto', 'perdido'];
        $empresas = ['Correos', 'Seur', 'MRW', 'DHL', 'UPS', 'FedEx', 'Amazon Logistics', 'CTT'];

        return [
            'codigo_seguimiento' => fake()->unique()->regexify('[A-Z]{2}[0-9]{9}[A-Z]{2}'),
            'estado' => fake()->randomElement($estados),
            'ultima_actualizacion' => fake()->optional(0.8)->dateTimeBetween('-30 days', 'now'),
            'empresa_reparto' => fake()->optional(0.9)->randomElement($empresas),
        ];
    }
} 