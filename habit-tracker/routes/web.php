<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use Illuminate\Auth\Events\Authenticated;

Route::get('/', [SiteController::class, 'index'] );

Route::get('/login', [LoginController::class, 'index']);

Route::post('/login', [LoginController::class, 'authenticated']);
    