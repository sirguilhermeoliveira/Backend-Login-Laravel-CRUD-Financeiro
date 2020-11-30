<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\ReceitaController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resources([
    'despesas' => DespesaController::class,
    'receitas' => ReceitaController::class,
]);
