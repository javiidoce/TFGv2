<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/equipo', [App\Http\Controllers\JugadorController::class, 'equipo'])->name('equipo');
Route::get('/equipo/jugador/{id}/editar', [App\Http\Controllers\JugadorController::class, 'editar'])->name('jugador.editar');

Route::patch('jugador/{id}', [App\Http\Controllers\JugadorController::class, 'update'])->name('jugador.update');
Route::delete('jugador/{id}', [App\Http\Controllers\JugadorController::class, 'delete'])->name('jugador.delete');
Route::get('jugador/crear', [App\Http\Controllers\JugadorController::class, 'crear'])->name('jugador.crear');
Route::post('jugador/crear', [App\Http\Controllers\JugadorController::class, 'store'])->name('jugador.store');
//el de crear jugador no funciona, mirar mas adelante

Route::get('/calendario', [App\Http\Controllers\FechasController::class, 'calendario'])->name('calendario');
Route::get('/calendario/fecha/{id}', [App\Http\Controllers\FechasController::class, 'editar'])->name('fecha.editar');
Route::patch('fecha/{id}', [App\Http\Controllers\FechasController::class, 'update'])->name('fecha.update');
Route::delete('fecha/{id}', [App\Http\Controllers\FechasController::class, 'delete'])->name('fecha.delete');

Route::get('/partido', [App\Http\Controllers\FechasController::class, 'createPartido'])->name('partido.create');
Route::post('/partido', [App\Http\Controllers\FechasController::class, 'storePartido'])->name('partido.store');

Route::get('/entrenamiento', [App\Http\Controllers\FechasController::class, 'createEntrenamiento'])->name('entrenamiento.create');
Route::post('/entrenamiento', [App\Http\Controllers\FechasController::class, 'storeEntrenamiento'])->name('entrenamiento.store');