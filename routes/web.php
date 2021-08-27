<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\UserController;
use App\Models\Pruebas;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::resource('/productos', ProductoController::class);
    Route::resource('/catalogos', CatalogoController::class);
    Route::resource('/usuarios', UserController::class);
    // Route::resource('/pruebas', PruebaController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});