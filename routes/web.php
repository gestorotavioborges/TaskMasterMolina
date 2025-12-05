<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TrabalhoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('trabalho.index');
    }
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/perfil', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/trabalhos/concluidos', [TrabalhoController::class, 'concluidos'])->name('trabalho.concluidos');
    Route::patch('/trabalho/{id}/concluir', [TrabalhoController::class, 'marcarConcluido'])->name('trabalho.marcarConcluido');
    Route::patch('/trabalho/{id}/reabrir', [TrabalhoController::class, 'reabrir'])->name('trabalho.reabrir');

    Route::resource('trabalho', TrabalhoController::class);
});