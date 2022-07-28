<?php

use App\Http\Controllers\HomeForRentController;
use App\Http\Controllers\HomePagesController;
use Illuminate\Support\Facades\Route;

Route::controller(HomePagesController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/sobrenos', 'aboutUs')->name('pages.aboutus');
    Route::get('/contato', 'contact')->name('pages.contact');
    Route::get('/nossotime', 'team')->name('pages.team');
    Route::get('/carreiras', 'careers')->name('pages.careers');
});

Route::controller(HomeForRentController::class)->group(function () {
    Route::get('/homes', 'index')->name("homesForRent.index");
    Route::get('/homes/search', 'search')->name("homesForRent.search");
    Route::get('/homes/{id}', 'show')->name("homesForRent.show");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
