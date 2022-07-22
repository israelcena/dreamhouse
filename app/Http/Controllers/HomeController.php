<?php

namespace App\Http\Controllers;

use App\Models\HomeForRent;
use App\Models\User;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __construct(
        public HomeForRent $homeForRent,
        public User $users
    )
    {
    }

    public function index(): View
    {
        $homes = $this->homeForRent::all()->random(4);
        return view('home', compact('homes'));
    }
}
