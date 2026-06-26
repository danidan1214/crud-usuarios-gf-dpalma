<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Rutas de la API REST del backend de PruebaGF.
| Prefijo por defecto: /api
|
*/

Route::get('/health', fn () => response()->json([
    'status' => 'ok',
    'service' => 'PruebaGF API',
]));