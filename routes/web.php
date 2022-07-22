<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
Route::controller(HomeController::class)->group(function (){
    Route::get('/','index')->name('index');
    Route::get('/sobrenos', 'aboutUs')->name('pages.aboutus');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
