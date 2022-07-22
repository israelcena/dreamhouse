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

    public function aboutUs(): View
    {
        return view('pages.aboutUs');
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function team(): View
    {
        return view('pages.team');
    }

    public function careers(): View
    {
        return view('pages.careers');
    }
}
