<?php

namespace App\Http\Controllers;

use App\Models\HomeForRent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeForRentController extends Controller
{
    public function __construct(
        public HomeForRent $homeForRent
    )
    {
    }

    public function index(Request $request): View
    {
        $search = $request->search;
        return view('homeForRent.index', [compact('search')]);
    }
}
