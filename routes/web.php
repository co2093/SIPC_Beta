<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Investigador\InvestigadorController;

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

Route::get('/formacionAcademica', [InvestigadorController::class, 'formacionAcademica'])->name('formacionAcademica');
Route::get('/experienciaLaboral', [InvestigadorController::class, 'experienciaLaboral'])->name('experienciaLaboral');
Route::get('/experienciaCientifica', [InvestigadorController::class, 'experienciaCientifica'])->name('experienciaCientifica');
Route::get('/publicaciones', [InvestigadorController::class, 'publicaciones'])->name('publicaciones');

