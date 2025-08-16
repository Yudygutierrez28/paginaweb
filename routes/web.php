<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApadrinacionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MascotaController;

Route::get('/mascotas', [ApadrinacionController::class, 'index'])->name('mascotas.index');

Route::get('/apadrinar/{id}', [ApadrinacionController::class, 'create'])->name('apadrinar.create');

Route::post('/apadrinar', [ApadrinacionController::class, 'store'])->name('apadrinar.store');

Route::get('/registro', [UsuarioController::class, 'showRegistroForm'])->name('usuarios.form');

Route::post('/registro', [UsuarioController::class, 'registrar'])->name('usuarios.registrar');

Route::resource('mascotas', MascotaController::class);

Route::get('/mascotas', [ApadrinacionController::class, 'index'])->name('mascotas.index');