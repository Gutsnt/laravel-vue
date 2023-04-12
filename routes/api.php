<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('index');

Route::post('/productos/create', [App\Http\Controllers\ProductoController::class, 'store'])->name('store');

Route::delete('/productos/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('destroy');

Route::put('/productos/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->name('update');

Route::post('/variaciones/create', [App\Http\Controllers\VariacionController::class, 'store'])->name('store');

