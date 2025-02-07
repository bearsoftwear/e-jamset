<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\LanderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::redirect('/dashboard', '/')->name('dashboard');
// Route::get('/dashboard', [TransactionController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => ['role:admin|lander']], function () {
        Route::resource('/lander', LanderController::class);
        Route::resource('/borrower', BorrowerController::class);
    });

    Route::resource('/transaction', TransactionController::class);
    Route::resource('/assets', AssetController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// TODO: approval 
