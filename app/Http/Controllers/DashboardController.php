<?php

namespace App\Http\Controllers;

use App\Models\HomeForRent;
use App\Models\User;
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
}
