<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadDeInvestigacionController;
use App\Http\Controllers\DependenciaJerarquicaController;
use App\Models\UnidadDeInvestigacion;

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

Route::resource('/unidadesDeInvestigacion', UnidadDeInvestigacionController::class);

Route::resource('/dependenciaJerarquica', DependenciaJerarquicaController::class);

// Listar todas las unidades de investigación
//Route::get('/unidades', [UnidadDeInvestigacionController::class, 'index'])->name('unidadesDeInvestigacion.index');


/*
Route::group(['prefix' => 'unidadesDeInvestigacion', 'as' => 'unidadesDeInvestigacion.'], function () {
    Route::get('/', [UnidadDeInvestigacion::class, 'index'])->name('index');
    Route::get('create', [UnidadDeInvestigacion::class, 'create'])->name('create');
    Route::post('post', [UnidadDeInvestigacion::class, 'store'])->name('store');
    Route::get('{unidadDeInvestigacion}/edit', [UnidadDeInvestigacion::class, 'edit'])->name('edit');
    Route::put('{unidadDeInvestigacion}', [UnidadDeInvestigacion::class, 'update'])->name('update');
    Route::delete('{unidadDeInvestigacion}/eliminar', [UnidadDeInvestigacion::class, 'destroy'])->name('destroy');
});*/