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



//Fuentes
Route::get('/fuentes', [App\Http\Controllers\FuentesController::class, 'index'])->name('fuentes.crear');
Route::get('/fuentes/show', [App\Http\Controllers\FuentesController::class, 'show'])->name('fuentes.show');



//Fuentes
Route::get('/presupuesto', [App\Http\Controllers\FuentesController::class, 'index'])->name('presupuesto.crear');
Route::get('/presupuesto/show', [App\Http\Controllers\FuentesController::class, 'show'])->name('presupuesto.show');




//Fuentes
Route::get('/recursos', [App\Http\Controllers\RecursosController::class, 'index'])->name('recursos.crear');
Route::get('/recursos/show', [App\Http\Controllers\RecursosController::class, 'show'])->name('recursos.show');




//Fuentes
Route::get('/personal', [App\Http\Controllers\PersonalController::class, 'index'])->name('personal.crear');
Route::get('/personal/show', [App\Http\Controllers\PersonalController::class, 'show'])->name('personal.show');




//Fuentes
Route::get('/materiales', [App\Http\Controllers\MaterialesController::class, 'index'])->name('materiales.crear');
Route::get('/materiales/show', [App\Http\Controllers\MaterialesController::class, 'show'])->name('materiales.show');




//Fuentes
Route::get('/viaticos', [App\Http\Controllers\ViaticosController::class, 'index'])->name('viaticos.crear');
Route::get('/viaticos/show', [App\Http\Controllers\ViaticosController::class, 'show'])->name('viaticos.show');


//Fuentes
Route::get('/viaticos/internacionales', [App\Http\Controllers\ViaticosController::class, 'indexInt'])->name('viaticos.int.crear');
Route::get('/viaticos/internacionales/show', [App\Http\Controllers\ViaticosController::class, 'showInt'])->name('viaticos.int.show');




//Fuentes
Route::get('/publicaciones', [App\Http\Controllers\PublicacionesController::class, 'index'])->name('publicaciones.crear');
Route::get('/publicaciones/show', [App\Http\Controllers\PublicacionesController::class, 'show'])->name('publicaciones.show');
