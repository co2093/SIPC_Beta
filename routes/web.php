<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadDeInvestigacionController;
use App\Http\Controllers\DependenciaJerarquicaController;
use App\Models\UnidadDeInvestigacion;
use App\Http\Controllers\ActividadesProyectoController;
use App\Http\Controllers\ActividadesProyectoIMasDController;
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

Auth::routes();

/*Rutas infraestructuras - Proyecto */
Route::get('/infraestructura', [App\Http\Controllers\Locaciones_de_unidadesController::class, 'index'])->name('homeInfraestructura');
Route::post('/setInfraestructura', [App\Http\Controllers\Locaciones_de_unidadesController::class, 'store'])->name('setInfraestructura');
Route::get('/edit/{id_locacion}', [App\Http\Controllers\Locaciones_de_unidadesController::class, 'edit'])->name('editInfraestructura');
Route::put('/update/{id}', [App\Http\Controllers\Locaciones_de_unidadesController::class, 'update'])->name('upInfraestructura');
Route::get('/delLocacioninfraestructura/{id}', [App\Http\Controllers\Locaciones_de_unidadesController::class, 'show'])->name('deleteLocacion');
Route::delete('/destroyLocacion/{id}', [App\Http\Controllers\Locaciones_de_unidadesController::class, 'destroy'])->name('destroyLocacion');
/*Rutas catalgo infraestructuras */
Route::get('/catalogoTipoInfraestructuras', [App\Http\Controllers\catInfraestructurasController::class, 'index'])->name('tpInfra');
Route::post('/storeCatInfraestructuras', [App\Http\Controllers\catInfraestructurasController::class, 'store'])->name('saveCatInfra');
Route::get('/edtCatInfraestructura/{id}', [App\Http\Controllers\catInfraestructurasController::class, 'edit'])->name('editCatInfraestructura');
Route::put('/updateCatIntraestructura/{id}', [App\Http\Controllers\catInfraestructurasController::class, 'update'])->name('upCatInfraestructura');
Route::get('/deleteCatinfraestructura/{id}', [App\Http\Controllers\catInfraestructurasController::class, 'show'])->name('delCatInfraestructura');
Route::delete('/destroyCatinfraestructura/{id}', [App\Http\Controllers\catInfraestructurasController::class, 'destroy'])->name('desCatInfraestructura');
Route::resource('/unidadesDeInvestigacion', UnidadDeInvestigacionController::class);

Route::resource('/dependenciaJerarquica', DependenciaJerarquicaController::class);
//RUTA DE RESPONSABLES
Route::get('/responsables', [App\Http\Controllers\ResponsableController::class, 'index'])->name('responsable.index');
Route::get('/create', [App\Http\Controllers\ResponsableController::class, 'create'])->name('responsable.create');
Route::get('/responsables/create/{id_unidad}', [App\Http\Controllers\ResponsableController::class, 'create'])->name('responsable.create');
Route::get('/buscarResponsable', [App\Http\Controllers\ResponsableController::class, 'buscar'])->name('responsable.buscar');
Route::post('/store', [App\Http\Controllers\ResponsableController::class, 'store'])->name('responsable.store');
Route::get('/edit', [App\Http\Controllers\ResponsableController::class, 'edit'])->name('responsable.edit');
Route::get('/show', [App\Http\Controllers\ResponsableController::class, 'show'])->name('responsable.show');
Route::put('/buscarPersona', [App\Http\Controllers\ResponsableController::class, 'buscarpersona'])->name('responsable.buscarpersona');
//Ruta de Investigadores
Route::get('/investigadores', 'App\Http\Controllers\InvestigadorController@index')->name('investHome');
Route::get('/investigadores/create', 'App\Http\Controllers\InvestigadorController@create')->name('investCreate');
Route::post('/investigadores', 'App\Http\Controllers\InvestigadorController@store')->name('investStore');
Route::get('/investigadores/{investigador}', 'App\Http\Controllers\InvestigadorController@show')->name('investShow');
Route::get('/investigadores/{investigador}/edit', 'App\Http\Controllers\InvestigadorController@edit')->name('investEdit');
Route::put('/investigadores/{investigador}', 'App\Http\Controllers\InvestigadorController@update')->name('investUpdate');
Route::delete('/investigadores/{investigador}', 'App\Http\Controllers\InvestigadorController@destroy')->name('investDestroy');
//Ruta de actividades u proyectos de capacidades institucionales
Route::get('/actividadesProyectos/create', [ActividadesProyectoController::class, 'create'])->name('actProCreate');
Route::post('/actividadesProyectos', [ActividadesProyectoController::class, 'store'])->name('actProStore');
Route::get('/actividadesProyectos/{id}', [ActividadesProyectoController::class, 'show'])->name('actProShow');
Route::get('/actividadesProyectos/{id}/edit', [ActividadesProyectoController::class, 'edit'])->name('actProEdit');
Route::put('/actividadesProyectos/{id}', [ActividadesProyectoController::class, 'update'])->name('actProUpdate');
Route::delete('/actividadesProyectos/{id}', [ActividadesProyectoController::class, 'destroy'])->name('actProDestroy');
Route::get('/actividadesProyectos', [ActividadesProyectoController::class, 'index'])->name('actProHome');
//Ruta de actividades de proyectos de formulario I+D
Route::get('/actividadesIMasD/create', [ActividadesProyectoIMasDController::class, 'create'])->name('actProIDCreate');
Route::post('/actividadesIMasD', [ActividadesProyectoIMasDController::class, 'store'])->name('actProIDStore');
Route::get('/actividadesIMasD/{id}', [ActividadesProyectoIMasDController::class, 'show'])->name('actProIDShow');
Route::get('/actividadesIMasD/{id}/edit', [ActividadesProyectoIMasDController::class, 'edit'])->name('actProIDEdit');
Route::put('/actividadesIMasD/{id}', [ActividadesProyectoIMasDController::class, 'update'])->name('actProIDUpdate');
Route::delete('/actividadesIMasD/{id}', [ActividadesProyectoIMasDController::class, 'destroy'])->name('actProIDDestroy');
Route::get('/actividadesIMasD', [ActividadesProyectoIMasDController::class, 'index'])->name('actProIDHome');