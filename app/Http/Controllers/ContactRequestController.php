<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use App\Models\HomeForRent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ContactRequestController extends Controller
{
    public function __construct(
        public ContactRequest $contactRequest
    ) {
    }

    /**
     * Display a listing of contact requests received.
     */
    public function index(): View
    {
        // Busca solicitações de contato para as casas do usuário
        $user = Auth::user();
        $homeIds = $user->homeForRent()->pluck('id');

        $contactRequests = $this->contactRequest
            ->whereIn('home_for_rent_id', $homeIds)
            ->with(['user', 'homeForRent'])
            ->latest()
            ->paginate(10);

        return view('contact-requests.index', compact('contactRequests'));
    }

    /**
     * Display my sent contact requests.
     */
    public function myRequests(): View
    {
        $contactRequests = Auth::user()
            ->contactRequests()
            ->with('homeForRent')
            ->latest()
            ->paginate(10);

        return view('contact-requests.my-requests', compact('contactRequests'));
    }

    /**
     * Store a new contact request.
     */
    public function store(Request $request, $homeId): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'message' => 'required|string|max:1000'
            ], [
                'name.required' => 'O nome é obrigatório.',
                'email.required' => 'O email é obrigatório.',
                'email.email' => 'O email deve ser válido.',
                'phone.required' => 'O telefone é obrigatório.',
                'message.required' => 'A mensagem é obrigatória.',
                'message.max' => 'A mensagem não pode ter mais de 1000 caracteres.'
            ]);

            $home = HomeForRent::findOrFail($homeId);

            // Impede que o proprietário solicite contato para sua própria casa
            if ($home->user_id === Auth::id()) {
                return redirect()
                    ->route('homesForRent.show', $homeId)
                    ->with('error', 'Você não pode solicitar contato para sua própria casa!');
            }

            $this->contactRequest->create([
                'user_id' => Auth::id(),
                'home_for_rent_id' => $homeId,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'message' => $validated['message'],
                'status' => 'pending'
            ]);

            return redirect()
                ->route('homesForRent.show', $homeId)
                ->with('success', 'Solicitação de contato enviada com sucesso! O proprietário entrará em contato em breve.');
        } catch (ValidationException $e) {
            return redirect()
                ->route('homesForRent.show', $homeId)
                ->withErrors($e->errors())
                ->withInput();
        }
    }

    /**
     * Update the status of a contact request.
     */
    public function updateStatus(Request $request, $id): RedirectResponse
    {
        $contactRequest = $this->contactRequest->findOrFail($id);

        // Verifica se o usuário é o dono da casa
        if ($contactRequest->homeForRent->user_id !== Auth::id()) {
            return redirect()
                ->route('contact-requests.index')
                ->with('error', 'Você não tem permissão para atualizar esta solicitação!');
        }

        $validated = $request->validate([
            'status' => 'required|in:pending,contacted,closed'
        ]);

        $contactRequest->update($validated);

        return redirect()
            ->route('contact-requests.index')
            ->with('success', 'Status atualizado com sucesso!');
    }
}
