<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
 * Index
 */
Route::get('/', function () {
    return view('welcome');
});

/*
 * Dashboard
 */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
 * ProfileControllers
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
 * Controllers\Auth
 */
require __DIR__.'/auth.php';
