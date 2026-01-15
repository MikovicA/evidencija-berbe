<?php

use App\Http\Controllers\PlanBerbeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnosBerbeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // BEZ can:, BEZ Gate
    Route::resource('plan-berbes', PlanBerbeController::class);
    Route::resource('unos-berbes', UnosBerbeController::class);
});

require __DIR__.'/auth.php';
