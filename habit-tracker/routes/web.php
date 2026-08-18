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
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [HabitController::class, 'index'])->name('site.dashboard'); // Dashboard do usuário autenticado
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout'); // Realiza o logout
    //Habitos
    Route::get('/dashboard/habits/create', [HabitController::class, 'create'])->name('habits.create'); // Formulário de criação de hábito

    // Route::post('/dashboard/habits', [HabitController::class, 'store'])->name('habits.store'); // Salva um novo hábito
    // Route::delete('/dashboard/habits/{habit}', [HabitController::class, 'destroy'])->name('habit.destroy'); // Remove um hábito
    // Route::get('/dashboard/habits/{habit}/edit', [HabitController::class, 'edit'])->name('habit.edit'); // Formulário de edição de hábito
    // Route::put('/dashboard/habits/{habit}', [HabitController::class, 'update'])->name('habit.update'); // Atualiza um hábito

    Route::resource('/dashboard/habits', HabitController::class)->except('show');
    Route::get('/dashboard/habits/configurar', [HabitController::class, 'settings'])->name('habits.settings');
});


