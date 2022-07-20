<?php

use App\Http\Controllers\HomeForRentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeForRentController::class, 'index']);
