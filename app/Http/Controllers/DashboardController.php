<?php

namespace App\Http\Controllers;

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

    public function store(Request $request): RedirectResponse
    {
        $homeForRent = $request->all();
        $homeForRent['user_id'] = Auth::user()->id;
        $this->homeForRent->create($homeForRent);
        return redirect()->route('dashboard.index')->with('create', 'Casa cadastrada com sucesso!');
    }

    public function destroy($id): RedirectResponse
    {
        $homeForRent = $this->homeForRent->findOrFail($id);
        $homeForRent->delete();
        return redirect()->route('dashboard.index')->with('delete', 'Casa excluída com sucesso!');
    }

    public function edit($id): View
    {
        $homeForRent = $this->homeForRent->findOrFail($id);
        return view('dashboard.edit', compact('homeForRent'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $homeForRent = $this->homeForRent->findOrFail($id);
        $homeForRent->update($request->all());
        return redirect()->route('dashboard.index')->with('update', 'Casa atualizada com sucesso!');
    }
}
