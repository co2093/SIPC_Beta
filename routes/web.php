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


//Proyectos
Route::get('/projects', [App\Http\Controllers\ProjectsController::class, 'index'])->name('projects.crear');
Route::get('/projects/show', [App\Http\Controllers\ProjectsController::class, 'show'])->name('projects.show');



//Objetivos
Route::get('/objetivos', [App\Http\Controllers\ObjetivosController::class, 'index'])->name('objetivos.crear');
Route::get('/objetivos/show', [App\Http\Controllers\ObjetivosController::class, 'show'])->name('objetivos.show');


//Actividades
Route::get('/actividades', [App\Http\Controllers\ActividadesController::class, 'index'])->name('actividades.crear');
Route::get('/actividades/show', [App\Http\Controllers\ActividadesController::class, 'show'])->name('actividades.show');


//Fuentes
Route::get('/fuentes', [App\Http\Controllers\FuentesController::class, 'index'])->name('fuentes.crear');
Route::get('/fuentes/show', [App\Http\Controllers\FuentesController::class, 'show'])->name('fuentes.show');