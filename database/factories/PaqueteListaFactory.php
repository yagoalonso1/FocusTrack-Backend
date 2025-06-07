<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paquete;
use App\Models\Lista;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaqueteLista>
 */
class PaqueteListaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_paquete' => Paquete::factory(),
            'id_lista' => Lista::factory(),
        ];
    }
} 