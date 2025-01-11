<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\AssetController::class, 'welcome'])->name('welcome');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AssetController::class, 'index'])->name('dashboard');
});
//
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource('/lander', \App\Http\Controllers\LanderController::class);
Route::resource('/assets', \App\Http\Controllers\AssetController::class);

// todo welcome page not login, and give different about user lander and borrower, give pagination,
// todo factory transaction, and give banner if the lander have approval from borrower
