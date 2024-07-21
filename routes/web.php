<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/* Public Guest routes */
/**
 * Index
 */
Route::view('/', 'welcome');


/* Unverified User routes */
Route::middleware('auth')->group(function () {

    /**
     * ProfileController
     * // todo: change to resource controller route  with only() method?
     */
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'edit')->name('profile.edit');
        Route::patch('profile', 'update')->name('profile.update');
        Route::delete('profile', 'destroy')->name('profile.destroy');
    });

});


/* Verified User routes */
Route::middleware(['auth', 'verified'])->group(function () {

    /**
     * Dashboard
     */
    Route::view('dashboard', 'dashboard')->name('dashboard');

    /**
     * ChirpController
     */
    Route::resource('chirps', ChirpController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);

    /**
     * PostController
     */
    Route::patch('posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore')->withTrashed();
    Route::delete('posts/{post}/delete', [PostController::class, 'delete'])->name('posts.delete')->withTrashed();
    Route::resource('posts', PostController::class);
});


/* Auth Controllers (Breeze routes) */
require __DIR__.'/auth.php';
