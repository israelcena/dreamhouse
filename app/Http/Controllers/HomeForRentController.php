<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeForRentController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('home');
    }
}
