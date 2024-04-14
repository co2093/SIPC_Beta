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
//Ruta de Investigadores
Route::resource('investigadores', 'App\Http\Controllers\InvestigadorController');
//Ruta de actividades de capacidades institucionales
Route::resource('actividadesProyectos', 'App\Http\Controllers\ActividadesProyectoController');

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

//RUTA DE RESPONSABLES
Route::get('/responsables', [App\Http\Controllers\ResponsableController::class, 'index'])->name('responsable.index');
Route::get('/create', [App\Http\Controllers\ResponsableController::class, 'create'])->name('responsable.create');
Route::get('/buscarResponsable', [App\Http\Controllers\ResponsableController::class, 'buscar'])->name('responsable.buscar');
Route::post('/store', [App\Http\Controllers\ResponsableController::class, 'store'])->name('responsable.store');
Route::get('/edit', [App\Http\Controllers\ResponsableController::class, 'edit'])->name('responsable.edit');
Route::get('/show', [App\Http\Controllers\ResponsableController::class, 'show'])->name('responsable.show');
Route::put('/buscarPersona', [App\Http\Controllers\ResponsableController::class, 'buscarpersona'])->name('responsable.buscarpersona');
