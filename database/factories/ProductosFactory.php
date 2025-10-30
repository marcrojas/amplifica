<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->words(2, true),
            'precio' => $this->faker->randomFloat(2, 1000, 50000),
            'peso'   => $this->faker->randomFloat(3, 0.1, 5),
            'ancho'  => $this->faker->randomFloat(2, 1, 100),
            'alto'   => $this->faker->randomFloat(2, 1, 100),
            'largo'  => $this->faker->randomFloat(2, 1, 100),
            'stock'  => $this->faker->numberBetween(0, 500),
        ];
    }
}
