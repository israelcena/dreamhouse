<?php

namespace App\Http\Controllers;

use App\Models\HomeForRent;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeForRentController extends Controller
{
    public function __construct(
        public HomeForRent $homeForRent,
        public User        $users,
        public Request     $req
    )
    {
    }

    public function index(): View
    {
        $filters = $this->req->all();

        // Se houver filtros, usa busca avançada
        if (!empty($filters) && count($filters) > 0) {
            $homes = $this->homeForRent->advancedSearch($filters)->paginate(7)->withQueryString();
        } else {
            $homes = $this->homeForRent->where('active', true)->paginate(7);
        }

        return view('pages.homeForRent.index', compact('homes', 'filters'));
    }

    public function search(): RedirectResponse|View
    {
        $homes = $this->homeForRent->search($this->req->search)->get();
        $search = $this->req->search;
        if ($homes->count() === 0) {
            return redirect()->route('homesForRent.index')->with('notfound', 'Desculpe, Sua busca não encontrou nenhum resultado !');
        }
        return view('pages.homeForRent.search', compact('homes', 'search'));
    }

    public function show($id): View
    {
        $home = $this->homeForRent->findOrFail($id);
        return view('pages.homeForRent.show', compact('home'));
    }
}
