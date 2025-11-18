<?php

namespace Database\Factories;

use App\Models\HomeForRent;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $comments = [
            'Casa incrível! Muito bem localizada e com excelente acabamento.',
            'Adorei o projeto, muito espaçoso e bem iluminado.',
            'Ótima casa, mas achei o preço um pouco elevado.',
            'Perfeita para família! Quartos amplos e jardim maravilhoso.',
            'Localização excelente, próximo a tudo que preciso.',
            'Bom projeto, mas precisa de algumas melhorias.',
            'Casa dos sonhos! Exatamente o que eu procurava.',
            'Muito bonita, mas gostaria de mais vagas de garagem.',
            'Ambiente aconchegante e bem decorado.',
            'Projeto moderno e funcional.',
        ];

        return [
            'user_id' => User::factory(),
            'home_for_rent_id' => HomeForRent::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->boolean(70) ? $this->faker->randomElement($comments) : null,
        ];
    }
}
