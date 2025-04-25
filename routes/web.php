<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User_Controller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Vacation Routes
    Route::get('/vacation', [User_Controller::class, 'vacation'])->name('Users.vacation');
    Route::post('/store-vacation', [User_Controller::class, 'store_Vacation'])->name('store.vacation');

    // Permission Routes
    Route::get('/permission', [User_Controller::class, 'permission'])->name('Users.permission');
    Route::post('/store-permission', [User_Controller::class, 'store_Permission'])->name('store.permission');
});

require __DIR__.'/auth.php';
