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
        return [
            'photo' => $this->faker->imageUrl(),
            'address' => $this->faker->address(),
            'condition' => $this->faker->word(),
            'value' => $this->faker->numberBetween(100000, 900000),
            'area' => $this->faker->numberBetween(10,1000),
            'bed' => $this->faker->numberBetween(1,6),
            'bath' => $this->faker->numberBetween(1, 5),
            'parking' => $this->faker->numberBetween(0, 3),
            'cep' => $this->faker->postcode(),
            'description' => $this->faker->text(200),
            'user_id' => User::all()->random()->id
        ];
    }
}
