<?php

namespace Database\Seeders;

use App\Models\ContactRequest;
use App\Models\HomeForRent;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContactRequestSeeder extends Seeder
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

        $messages = [
            'Olá! Estou muito interessado nesta casa. Poderia me passar mais informações sobre disponibilidade e condições de pagamento?',
            'Boa tarde! Gostaria de agendar uma visita para conhecer o imóvel. Quando seria possível?',
            'Oi! Vi que esta casa possui exatamente o que estou procurando. Podemos conversar melhor sobre os detalhes?',
            'Olá! Estou procurando uma casa nesta região e adorei este imóvel. Poderia me enviar mais fotos e informações?',
            'Bom dia! Tenho interesse em alugar/comprar esta casa. Quais são as próximas etapas?',
            'Olá! Estou relocando para esta região e esta casa chamou muito minha atenção. Vamos conversar?',
            'Oi! Gostaria de saber mais sobre o bairro e sobre esta casa. Poderia me passar seu contato?',
            'Olá! Estou muito interessado. A casa ainda está disponível?',
        ];

        $statuses = ['pending', 'contacted', 'closed'];

        foreach ($homes as $home) {
            // Cada casa recebe entre 1 e 3 solicitações de contato
            $numRequests = rand(1, 3);

            // Pega usuários aleatórios (exceto o dono da casa)
            $potentialUsers = $users->where('id', '!=', $home->user_id);

            if ($potentialUsers->isEmpty()) {
                continue;
            }

            $requestingUsers = $potentialUsers->random(min($numRequests, $potentialUsers->count()));

            foreach ($requestingUsers as $user) {
                ContactRequest::create([
                    'user_id' => $user->id,
                    'home_for_rent_id' => $home->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone ?? '(11) ' . rand(90000, 99999) . '-' . rand(1000, 9999),
                    'message' => $messages[array_rand($messages)],
                    'status' => $statuses[array_rand($statuses)],
                ]);
            }
        }

        $this->command->info('Solicitações de contato criadas com sucesso!');
    }
}
