<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\LanderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/assets', AssetController::class);
Route::resource('/lander', LanderController::class);
Route::resource('/borrower', BorrowerController::class);
Route::resource('/transaction', TransactionController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// todo welcome page not login, and give different about user lander and borrower, give pagination,
// todo factory transaction, and give banner if the lander have approval from borrower
