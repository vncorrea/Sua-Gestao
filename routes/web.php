<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Rotas de autenticação mantidas conforme já configurado
Auth::routes();

// Rota protegida para o dashboard (ou outra área onde o Vue será utilizado)
Route::get('/dashboard', function () {
    return view('dashboard'); // view que carrega o SPA em Vue.js
})->middleware('auth');

