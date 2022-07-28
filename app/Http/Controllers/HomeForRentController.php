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
        $homes = $this->homeForRent->paginate(7);
        $search = $this->req->search;
        return view('pages.homeForRent.index', compact('homes', 'search'));
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
}
