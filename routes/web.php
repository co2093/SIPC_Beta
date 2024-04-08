<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//RUTA DE RESPONSABLES
Route::get('/responsables', [App\Http\Controllers\ResponsableController::class, 'index'])->name('responsable.index');
Route::get('/create', [App\Http\Controllers\ResponsableController::class, 'create'])->name('responsable.create');
Route::get('/buscarResponsable', [App\Http\Controllers\ResponsableController::class, 'buscar'])->name('responsable.buscar');
Route::post('/store', [App\Http\Controllers\ResponsableController::class, 'store'])->name('responsable.store');
Route::get('/edit', [App\Http\Controllers\ResponsableController::class, 'edit'])->name('responsable.edit');
Route::get('/show', [App\Http\Controllers\ResponsableController::class, 'show'])->name('responsable.show');
Route::put('/buscarPersona', [App\Http\Controllers\ResponsableController::class, 'buscarpersona'])->name('responsable.buscarpersona');
 