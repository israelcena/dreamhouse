<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\HomeForRent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    public function __construct(
        public Favorite $favorite
    ) {
    }

    /**
     * Display a listing of user's favorites.
     */
    public function index(): View
    {
        $favorites = Auth::user()->favorites()->with('homeForRent')->latest()->paginate(10);
        return view('favorites.index', compact('favorites'));
    }

    /**
     * Toggle favorite status for a home.
     */
    public function toggle($homeId): JsonResponse
    {
        $home = HomeForRent::findOrFail($homeId);
        $userId = Auth::id();

        $favorite = $this->favorite
            ->where('user_id', $userId)
            ->where('home_for_rent_id', $homeId)
            ->first();

        if ($favorite) {
            // Remove from favorites
            $favorite->delete();
            return response()->json([
                'success' => true,
                'favorited' => false,
                'message' => 'Removido dos favoritos'
            ]);
        } else {
            // Add to favorites
            $this->favorite->create([
                'user_id' => $userId,
                'home_for_rent_id' => $homeId
            ]);
            return response()->json([
                'success' => true,
                'favorited' => true,
                'message' => 'Adicionado aos favoritos'
            ]);
        }
    }

    /**
     * Remove a favorite.
     */
    public function destroy($id): RedirectResponse
    {
        $favorite = $this->favorite->findOrFail($id);

        // Verifica se o usuário é o dono do favorito
        if ($favorite->user_id !== Auth::id()) {
            return redirect()
                ->route('favorites.index')
                ->with('error', 'Você não tem permissão para excluir este favorito!');
        }

        $favorite->delete();

        return redirect()
            ->route('favorites.index')
            ->with('success', 'Favorito removido com sucesso!');
    }
}
