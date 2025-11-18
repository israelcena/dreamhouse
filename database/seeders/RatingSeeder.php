<?php

namespace Database\Seeders;

use App\Models\HomeForRent;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $homes = HomeForRent::all();

        if ($users->isEmpty() || $homes->isEmpty()) {
            $this->command->warn('Certifique-se de que existem usuários e casas antes de executar este seeder.');
            return;
        }

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

        foreach ($homes as $home) {
            // Gera entre 0 e 5 avaliações aleatórias para cada casa
            $numRatings = rand(0, 5);
            $ratedUsers = $users->random(min($numRatings, $users->count()));

            foreach ($ratedUsers as $user) {
                // Não deixa o proprietário avaliar sua própria casa
                if ($user->id === $home->user_id) {
                    continue;
                }

                // Verifica se o usuário já avaliou esta casa
                $existingRating = Rating::where('user_id', $user->id)
                    ->where('home_for_rent_id', $home->id)
                    ->first();

                if (!$existingRating) {
                    Rating::create([
                        'user_id' => $user->id,
                        'home_for_rent_id' => $home->id,
                        'rating' => rand(3, 5), // Maioria das avaliações são positivas
                        'comment' => rand(0, 1) ? $comments[array_rand($comments)] : null,
                    ]);
                }
            }
        }

        $this->command->info('Avaliações criadas com sucesso!');
    }
}
