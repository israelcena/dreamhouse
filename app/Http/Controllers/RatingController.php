<?php

namespace App\Http\Controllers;

use App\Models\HomeForRent;
use App\Models\Rating;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RatingController extends Controller
{
    public function __construct(
        public Rating $rating
    ) {
    }

    /**
     * Store a new rating for a home.
     */
    public function store(Request $request, $homeId): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string|max:1000'
            ]);

            $home = HomeForRent::findOrFail($homeId);

            // Verifica se o usuário já avaliou esta casa
            $existingRating = $this->rating
                ->where('user_id', Auth::id())
                ->where('home_for_rent_id', $homeId)
                ->first();

            if ($existingRating) {
                return redirect()
                    ->route('homesForRent.show', $homeId)
                    ->with('error', 'Você já avaliou esta casa anteriormente!');
            }

            // Impede que o proprietário avalie sua própria casa
            if ($home->user_id === Auth::id()) {
                return redirect()
                    ->route('homesForRent.show', $homeId)
                    ->with('error', 'Você não pode avaliar sua própria casa!');
            }

            $this->rating->create([
                'user_id' => Auth::id(),
                'home_for_rent_id' => $homeId,
                'rating' => $validated['rating'],
                'comment' => $validated['comment'] ?? null
            ]);

            return redirect()
                ->route('homesForRent.show', $homeId)
                ->with('success', 'Avaliação cadastrada com sucesso!');
        } catch (ValidationException $e) {
            return redirect()
                ->route('homesForRent.show', $homeId)
                ->withErrors($e->errors())
                ->withInput();
        }
    }

    /**
     * Update an existing rating.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string|max:1000'
            ]);

            $rating = $this->rating->findOrFail($id);

            // Verifica se o usuário é o dono da avaliação
            if ($rating->user_id !== Auth::id()) {
                return redirect()
                    ->route('homesForRent.show', $rating->home_for_rent_id)
                    ->with('error', 'Você não tem permissão para editar esta avaliação!');
            }

            $rating->update($validated);

            return redirect()
                ->route('homesForRent.show', $rating->home_for_rent_id)
                ->with('success', 'Avaliação atualizada com sucesso!');
        } catch (ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput();
        }
    }

    /**
     * Delete a rating.
     */
    public function destroy($id): RedirectResponse
    {
        $rating = $this->rating->findOrFail($id);

        // Verifica se o usuário é o dono da avaliação
        if ($rating->user_id !== Auth::id()) {
            return redirect()
                ->route('homesForRent.show', $rating->home_for_rent_id)
                ->with('error', 'Você não tem permissão para excluir esta avaliação!');
        }

        $homeId = $rating->home_for_rent_id;
        $rating->delete();

        return redirect()
            ->route('homesForRent.show', $homeId)
            ->with('success', 'Avaliação excluída com sucesso!');
    }
}
