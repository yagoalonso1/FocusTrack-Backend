<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $colores = ['Rojo', 'Azul', 'Verde', 'Negro', 'Blanco', 'Amarillo', 'Rosa', 'Morado', 'Naranja', 'Gris'];
        $tallas = ['XS', 'S', 'M', 'L', 'XL', 'XXL', '36', '38', '40', '42', '44', '46'];
        $marcas = ['Nike', 'Adidas', 'Zara', 'H&M', 'Mango', 'Pull&Bear', 'Bershka', 'Stradivarius', 'Massimo Dutti', 'Uniqlo'];
        $tipos = ['Camiseta', 'Pantalón', 'Zapatos', 'Chaqueta', 'Vestido', 'Falda', 'Sudadera', 'Jeans', 'Blusa', 'Abrigo'];
        $plataformas = ['Amazon', 'Aliexpress', 'eBay', 'Shopee', 'Wish', 'Temu', 'Zalando', 'Asos'];

        $cantidadComprada = fake()->numberBetween(1, 50);
        $cantidadDisponible = fake()->numberBetween(0, $cantidadComprada);
        
        $precioComprado = fake()->randomFloat(2, 5, 200);
        $precioEnvio = fake()->randomFloat(2, 0, 15);
        $precioPagadoOriginal = $precioComprado + $precioEnvio;
        $precioPagadoFinal = $precioPagadoOriginal * fake()->randomFloat(2, 0.8, 1.2); // Variación del 20%
        $precioVenta = $precioPagadoFinal * fake()->randomFloat(2, 1.1, 2.5); // Margen de beneficio

        return [
            'nombre' => fake()->randomElement($tipos) . ' ' . fake()->randomElement($marcas),
            'color' => fake()->optional(0.8)->randomElement($colores),
            'talla' => fake()->optional(0.7)->randomElement($tallas),
            'marca' => fake()->optional(0.9)->randomElement($marcas),
            'cantidad_comprada' => $cantidadComprada,
            'cantidad_disponible' => $cantidadDisponible,
            'tipo' => fake()->randomElement($tipos),
            'precio_pagado' => $precioPagadoFinal,
            'precio_comprado' => $precioComprado,
            'precio_pagado_original' => $precioPagadoOriginal,
            'precio_pagado_final' => $precioPagadoFinal,
            'precio_venta' => $precioVenta,
            'plataforma' => fake()->randomElement($plataformas),
            'precio_envio' => $precioEnvio,
        ];
    }
} 