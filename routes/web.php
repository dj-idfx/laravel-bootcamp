<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/* Public Guest routes */
/**
 * Index
 */
Route::get('/', function () {
    return view('welcome');
});


/* Unverified User routes */
Route::middleware('auth')->group(function () {

    /**
     * ProfileController
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/* Verified User routes */
Route::middleware(['auth', 'verified'])->group(function () {

    /**
     * Dashboard
     */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /**
     * ChirpController
     */
    Route::resource('chirps', ChirpController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);

    /**
     * PostController
     */
    Route::patch('/posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore')->withTrashed();
    Route::delete('/posts/{post}/delete', [PostController::class, 'delete'])->name('posts.delete')->withTrashed();
    Route::resource('posts', PostController::class);
});


/* Auth Controllers (Breeze routes) */
require __DIR__.'/auth.php';
