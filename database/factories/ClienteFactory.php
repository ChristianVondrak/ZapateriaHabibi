<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->firstName(),
            'correo' => fake()->unique()->safeEmail(),
            'apellido' => fake()->lastName(),
            'cedula' => fake()->latitude($min = -90, $max = 90)
        ];
    }
}
