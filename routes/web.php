<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;


Route::middleware('guest.session')->group(function(){
    Route::get('/',      [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/restore-password',[AuthController::class, 'restorePassword'])->name('restore.password');

    // Registro externo
    Route::get('/create-user', [AuthController::class, 'createUser'])->name('create.user');
    Route::post('/create-user', [AuthController::class, 'storePublicUser'])->name('store.public.user');
});

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth.session');

Route::middleware('auth.session')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resources([
        'dashboard/users' => UserController::class,
        'dashboard/cities' => CityController::class
    ]);
});





