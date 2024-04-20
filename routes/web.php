<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Investigador\InvestigadorController;
use App\Http\Controllers\RoleController;
use Spatie\Permission\Middlewares\RoleMiddleware;

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


//Investigador
Route::get('/formacionAcademica', [InvestigadorController::class, 'formacionAcademica'])->middleware('role:investigador')->name('formacionAcademica');
//Route::get('/experienciaLaboral', [InvestigadorController::class, 'experienciaLaboral'])->name('experienciaLaboral');
Route::get('/experienciaCientifica', [InvestigadorController::class, 'experienciaCientifica'])->middleware('role:investigador')->name('experienciaCientifica');
Route::get('/otrasCompetencias', [InvestigadorController::class, 'otrasCompetencias'])->middleware('role:investigador')->name('otrasCompetencias');

Route::get('/redInvestigador', [InvestigadorController::class, 'redInvestigador'])->middleware('role:investigador')->name('redInvestigador');
Route::get('/proyectoInvestigacion', [InvestigadorController::class, 'proyectoInvestigacion'])->middleware('role:investigador')->name('proyectoInvestigacion');


//Route::get('/roles', [RolController::class, 'index'])->name('roles');

Route::resource('roles', RoleController::class);