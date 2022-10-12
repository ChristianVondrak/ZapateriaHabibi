<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pedido;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PedidoItem>
 */
class PedidoItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $pedidos = Pedido::pluck('id')->toArray();
        return [
            'description'=> $this->faker->text(20),
            'image'=> $this->faker->text(20),
            'pedido_id' => $this->faker->randomElement($pedidos),
        ];
    }
}
