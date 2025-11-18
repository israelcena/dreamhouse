<?php

namespace Database\Seeders;

use App\Models\Favorite;
use App\Models\HomeForRent;
use App\Models\User;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
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

        foreach ($users as $user) {
            // Cada usuário favorita entre 2 e 5 casas aleatórias
            $numFavorites = rand(2, min(5, $homes->count()));
            $randomHomes = $homes->random($numFavorites);

            foreach ($randomHomes as $home) {
                // Verifica se já não existe este favorito
                $existingFavorite = Favorite::where('user_id', $user->id)
                    ->where('home_for_rent_id', $home->id)
                    ->first();

                if (!$existingFavorite) {
                    Favorite::create([
                        'user_id' => $user->id,
                        'home_for_rent_id' => $home->id,
                    ]);
                }
            }
        }

        $this->command->info('Favoritos criados com sucesso!');
    }
}
