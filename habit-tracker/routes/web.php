<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\HabitController;

//Site
Route::get('/', [SiteController::class, 'index'])->name('site.inicio'); // Página inicial


//Login
Route::get('/login', [LoginController::class, 'index'])->name('site.login'); // Exibe o formulário de login
Route::post('/login', [LoginController::class, 'authenticated'])->name('auth.login'); // Processa a autenticação


Route::get('/cadastro', [RegistroController::class, 'index'])->name('site.register'); // Exibe o formulário de cadastro
Route::post('/cadastro', [RegistroController::class, 'store'])->name('auth.register'); // Processa o cadastro


//AUTH
Route::middleware('auth')->group(function(){// Dashboard do usuário autenticado
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout'); // Realiza o logout

    Route::resource('/dashboard/habits', HabitController::class)->except('show');
    Route::get('/dashboard/habits/configurar', [HabitController::class, 'settings'])->name('habits.settings');

    Route::post('/dashboard/habits/{habit}/toggle', [HabitController::class, 'toggle'])->name('habits.toggle');

    Route::get('/dashboard/habits/historico', [HabitController::class, 'history'])->name('habits.history');

});


