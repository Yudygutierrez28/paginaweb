<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ApadrinacionController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

// Página principal (index)
Route::get('/', [MascotaController::class, 'index'])->name('mascotas.index');

// Rutas de perfil (solo usuarios autenticados)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD Mascotas
Route::resource('mascotas', MascotaController::class);

// Rutas de registro de usuarios
Route::get('/usuarios/registro', [UsuarioController::class, 'showRegistroForm'])->name('usuarios.form');
Route::post('/usuarios/registro', [UsuarioController::class, 'registrar'])->name('usuarios.registrar');

// Apadrinación
Route::get('/mascotas/{id}/apadrinar', [ApadrinacionController::class, 'create'])->name('apadrinacion.create');
Route::post('/apadrinar', [ApadrinacionController::class, 'store'])->name('apadrinacion.store');

// Adoptantes
Route::resource('adoptantes', AdoptanteController::class);
Route::get('adoptantes/pdf', [AdoptanteController::class, 'exportPDF'])->name('adoptantes.pdf');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::prefix('reportes')->group(function () {
    Route::get('/', [ReporteController::class, 'index'])->name('reportes.index');
    Route::get('/pdf', [ReporteController::class, 'exportPDF'])->name('reportes.pdf');
    Route::get('/excel', [ReporteController::class, 'exportExcel'])->name('reportes.excel');
});
// Autenticación (Laravel Breeze)
require __DIR__.'/auth.php';
