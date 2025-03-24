<?php

use App\Http\Controllers\ComunaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Comunas
Route::get('/comunas', [ComunaController::class, 'index'])->name('comunas.index');
Route::post('/comunas', [ComunaController::class, 'store'])->name('comunas.store');
Route::get('/comunas/create', [ComunaController::class, 'create'])->name('comunas.create');
Route::delete('/comunas/{comuna}', [ComunaController::class, 'destroy'])->name('comunas.destroy');
Route::put('/comunas/{comuna}', [ComunaController::class, 'update'])->name('comunas.update');
Route::get('/comunas/{comuna}/edit', [ComunaController::class, 'edit'])->name('comunas.edit');

// Municipios
Route::get('/municipios', [ComunaController::class, 'index'])->name('municipios.index');
Route::post('/municipios', [ComunaController::class, 'store'])->name('municipios.store');
Route::get('/municipios/create', [ComunaController::class, 'create'])->name('municipios.create');
Route::delete('/municipios/{comuna}', [ComunaController::class, 'destroy'])->name('municipios.destroy');
Route::put('/municipios/{comuna}', [ComunaController::class, 'update'])->name('municipios.update');
Route::get('/municipios/{comuna}/edit', [ComunaController::class, 'edit'])->name('municipios.edit');
