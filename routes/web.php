<?php

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

// Página principal
Route::get('/', function () {
    return redirect()->route('solicitudes.index');
});

// Rutas de estudiantes
Route::resource('estudiantes', EstudianteController::class)
    ->only(['index', 'create', 'store', 'show']);

// Rutas de solicitudes con parámetro correcto
Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('solicitudes.index');
Route::get('/solicitudes/create', [SolicitudController::class, 'create'])->name('solicitudes.create');
Route::post('/solicitudes', [SolicitudController::class, 'store'])->name('solicitudes.store');
Route::get('/solicitudes/{solicitud}', [SolicitudController::class, 'show'])->name('solicitudes.show');
Route::get('/solicitudes/{solicitud}/edit', [SolicitudController::class, 'edit'])->name('solicitudes.edit');
Route::put('/solicitudes/{solicitud}', [SolicitudController::class, 'update'])->name('solicitudes.update');