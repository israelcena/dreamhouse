<?php

use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeForRentController;
use App\Http\Controllers\HomePagesController;
use App\Http\Controllers\RatingController;
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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/incluir', [DashboardController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard/incluir', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/{id}/editar', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/excluir/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');

    // Rating routes
    Route::post('/homes/{home}/ratings', [RatingController::class, 'store'])->name('ratings.store');
    Route::put('/ratings/{rating}', [RatingController::class, 'update'])->name('ratings.update');
    Route::delete('/ratings/{rating}', [RatingController::class, 'destroy'])->name('ratings.destroy');

    // Favorite routes
    Route::get('/favoritos', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/homes/{home}/favorite/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::delete('/favoritos/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    // Contact Request routes
    Route::get('/solicitacoes-contato', [ContactRequestController::class, 'index'])->name('contact-requests.index');
    Route::get('/minhas-solicitacoes', [ContactRequestController::class, 'myRequests'])->name('contact-requests.my-requests');
    Route::post('/homes/{home}/contato', [ContactRequestController::class, 'store'])->name('contact-requests.store');
    Route::patch('/solicitacoes-contato/{contactRequest}/status', [ContactRequestController::class, 'updateStatus'])->name('contact-requests.update-status');
});

require __DIR__ . '/auth.php';
