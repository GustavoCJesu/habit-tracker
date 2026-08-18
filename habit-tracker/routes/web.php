<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\HabitController;

//Site
Route::get('/', [SiteController::class, 'index'])->name('site.inicio');


//Login
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'authenticated'])->name('auth.login');

Route::get('/cadastro', [RegistroController::class, 'index'])->name('site.register');
Route::post('/cadastro', [RegistroController::class, 'store'])->name('auth.register');


//AUTH
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('site.dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

    //Habitos
    Route::get('/dashboard/habits/create', [HabitController::class, 'create'])->name('habits.create');
    Route::post('/dashboard/habits', [HabitController::class, 'store'])->name('habits.store');

    Route::delete('/dashboard/habits/{habit}', [HabitController::class, 'destroy'])->name('habit.destroy');
});


