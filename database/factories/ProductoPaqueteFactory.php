<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
use App\Models\Paquete;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductoPaquete>
 */
class ProductoPaqueteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_producto' => Producto::factory(),
            'id_paquete' => Paquete::factory(),
            'cantidad' => fake()->numberBetween(1, 5),
        ];
    }
} 