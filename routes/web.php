<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User_Controller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [User_Controller::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Vacation Routes
    Route::get('/vacation', [User_Controller::class, 'vacation'])->name('Users.vacation');
    Route::post('/store-vacation', [User_Controller::class, 'store_Vacation'])->name('store.vacation');

    // Permission Routes
// Show the permission form
    Route::post('/permission/store', [User_Controller::class, 'store_Permission'])->name('Users.permission.store');

    Route::get('/permission', [User_Controller::class, 'permission'])->name('Users.permission');

    // Handle form submission

});

require __DIR__.'/auth.php';
