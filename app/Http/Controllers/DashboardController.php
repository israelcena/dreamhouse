<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomeForRentRequest;
use App\Http\Requests\UpdateHomeForRentRequest;
use App\Models\HomeForRent;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function __construct(
        public User $user,
        public HomeForRent $homeForRent
    ) {
    }

    public function index(Auth $auth): View
    {
        $InUser = $auth::user();
        $InUser->load('homeForRent');
        $homesOfUser = $InUser->homeForRent;
        return view('dashboard.index', compact('InUser', 'homesOfUser'));
    }

    public function create(): View
    {
        return view('dashboard.create');
    }

    public function store(StoreHomeForRentRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $validated['active'] = $request->has('active');

        $this->homeForRent->create($validated);
        return redirect()->route('dashboard.index')->with('create', 'Casa cadastrada com sucesso!');
    }

    public function destroy($id): RedirectResponse
    {
        $homeForRent = $this->homeForRent->findOrFail($id);

        // Verifica se o usuário é o dono da casa
        if ($homeForRent->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para excluir esta casa.');
        }

        $homeForRent->delete();
        return redirect()->route('dashboard.index')->with('delete', 'Casa excluída com sucesso!');
    }

    public function edit($id): View
    {
        $homeForRent = $this->homeForRent->findOrFail($id);

        // Verifica se o usuário é o dono da casa
        if ($homeForRent->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para editar esta casa.');
        }

        return view('dashboard.edit', compact('homeForRent'));
    }

    public function update(UpdateHomeForRentRequest $request, $id): RedirectResponse
    {
        $homeForRent = $this->homeForRent->findOrFail($id);
        $validated = $request->validated();
        $validated['active'] = $request->has('active');

        $homeForRent->update($validated);
        return redirect()->route('dashboard.index')->with('update', 'Casa atualizada com sucesso!');
    }
}
