<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomeForRent>
 */
class HomeForRentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $condition = ['Pronto para morar', 'Novo', 'Na Planta'];
        $types = ['Casa', 'Terreno', 'Apartamento'];

        return [
            'description' => $this->faker->text(300),
            'photo' => $this->faker->imageUrl(),
            'address' => $this->faker->address(),
            'condition' => $condition[array_rand($condition)],
            'type' => $this->faker->randomElement($types),
            'value' => $this->faker->randomFloat(2, 10000, 1000000),
            'area' => $this->faker->numberBetween(10,1000),
            'bed' => $this->faker->numberBetween(1,6),
            'bath' => $this->faker->numberBetween(1, 5),
            'parking' => $this->faker->numberBetween(0, 3),
            'cep' => $this->faker->postcode(),
            'active' => true,
            'user_id' => User::all()->random()->id
        ];
    }
}
