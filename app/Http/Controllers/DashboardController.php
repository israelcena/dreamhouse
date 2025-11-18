<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomeForRentRequest;
use App\Http\Requests\UpdateHomeForRentRequest;
use App\Models\HomeForRent;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

        // Handle image upload
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('homes', 'public');
            $validated['photo'] = Storage::url($path);
        } elseif ($request->filled('photo_url')) {
            $validated['photo'] = $request->input('photo_url');
        }

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

        // Delete image if stored locally
        if ($homeForRent->photo && str_starts_with($homeForRent->photo, '/storage/')) {
            $path = str_replace('/storage/', '', $homeForRent->photo);
            Storage::disk('public')->delete($path);
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

        // Handle image upload
        if ($request->hasFile('photo')) {
            // Delete old image if exists and is stored locally
            if ($homeForRent->photo && str_starts_with($homeForRent->photo, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $homeForRent->photo);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('photo')->store('homes', 'public');
            $validated['photo'] = Storage::url($path);
        } elseif ($request->filled('photo_url')) {
            $validated['photo'] = $request->input('photo_url');
        }

        $homeForRent->update($validated);
        return redirect()->route('dashboard.index')->with('update', 'Casa atualizada com sucesso!');
    }
}
