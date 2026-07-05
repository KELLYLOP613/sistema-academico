<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Corregir el nombre de la ruta para Solicitud
        Route::model('solicitud', \App\Models\Solicitud::class);
    }
}