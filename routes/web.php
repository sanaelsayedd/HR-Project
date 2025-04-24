<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User_Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',  [User_Controller::class,'index'])->name('Users.index');

// Vacation routes
Route::get('/vacation', [User_Controller::class, 'vacation'])->name('Users.vacation');
Route::post('/store-vacation', [User_Controller::class, 'store_Vacation'])->name('store.vacation');

// Permission routes
Route::get('/permission', [User_Controller::class, 'permission'])->name('Users.permission');
Route::post('/store-permission', [User_Controller::class, 'store_Permission'])->name('store.permission');

Route::get('/profile',  [User_Controller::class,'profile'])->name('Users.profile');

// Authentication routes
Route::get('/login', [User_Controller::class, 'login'])->name('login');
Route::post('/login', [User_Controller::class, 'doLogin'])->name('do.login');
Route::post('/register', [User_Controller::class, 'doRegister'])->name('do.register');

