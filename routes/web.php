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
Route::get('/projects/crear/nuevo/{cod}', [App\Http\Controllers\ProjectsController::class, 'index'])->name('projects.crear');
Route::get('/projects/iniciar', [App\Http\Controllers\ProjectsController::class, 'iniciar'])->name('projects.iniciar');

Route::get('/projects/show', [App\Http\Controllers\ProjectsController::class, 'show'])->name('projects.show');
Route::get('/projects/registro/pasos/{cod}', [App\Http\Controllers\ProjectsController::class, 'prueba'])->name('projects.prueba');
Route::get('/projects/protocolo', [App\Http\Controllers\ProjectsController::class, 'protocolo'])->name('projects.protocolo');
Route::get('/projects/enviar', [App\Http\Controllers\ProjectsController::class, 'enviar'])->name('projects.enviar');

Route::get('/projects/archivados', [App\Http\Controllers\ProjectsController::class, 'archivadosindex'])->name('archivados.crear');
Route::get('/projects/archivados/show', [App\Http\Controllers\ProjectsController::class, 'archivadosshow'])->name('archivados.show');
Route::post('/projects/nuevo/project', [App\Http\Controllers\ProjectsController::class, 'store'])->name('projects.store');

Route::get('/projects/confirm/{cod}',[App\Http\Controllers\ProjectsController::class, 'destroyConfirm'])->name('projects.confirm');
Route::delete('/projects/{cod}',[App\Http\Controllers\ProjectsController::class, 'destroy'])->name('projects.destroy');
Route::get('/projects/edit/{cod}',[App\Http\Controllers\ProjectsController::class, 'edit'])->name('projects.edit');
Route::post('/projects/update', [App\Http\Controllers\ProjectsController::class, 'update'])->name('projects.update');
Route::get('/projects/details/{cod}',[App\Http\Controllers\ProjectsController::class, 'details'])->name('projects.details');





//Objetivos
Route::get('/objetivos/crear/{cod}', [App\Http\Controllers\ObjetivosController::class, 'index'])->name('objetivos.crear');
Route::get('/objetivos/show/{cod}', [App\Http\Controllers\ObjetivosController::class, 'show'])->name('objetivos.show');
Route::post('/objetivos/nuevo/obj', [App\Http\Controllers\ObjetivosController::class, 'store'])->name('objetivos.store');
Route::get('/objetivos/confirm/{id}',[App\Http\Controllers\ObjetivosController::class, 'destroyConfirm'])->name('objetivos.confirm');
Route::post('/objetivos/update', [App\Http\Controllers\ObjetivosController::class, 'update'])->name('objetivos.update');
Route::delete('/objetivos/delete/{cod}',[App\Http\Controllers\ObjetivosController::class, 'destroy'])->name('objetivos.destroy');
Route::get('/objetivos/edit/{cod}',[App\Http\Controllers\ObjetivosController::class, 'edit'])->name('objetivos.edit');




//Actividades
Route::get('/actividades/crear/{cod}', [App\Http\Controllers\ActividadesController::class, 'index'])->name('actividades.crear');
Route::get('/actividades/show/{cod}', [App\Http\Controllers\ActividadesController::class, 'show'])->name('actividades.show');
Route::post('/actividades/nuevo/obj', [App\Http\Controllers\ActividadesController::class, 'store'])->name('actividades.store');
Route::get('/actividades/confirm/{id}',[App\Http\Controllers\ActividadesController::class, 'destroyConfirm'])->name('actividades.confirm');
Route::post('/actividades/update', [App\Http\Controllers\ActividadesController::class, 'update'])->name('actividades.update');
Route::delete('/actividades/delete/{cod}',[App\Http\Controllers\ActividadesController::class, 'destroy'])->name('actividades.destroy');
Route::get('/actividades/edit/{cod}',[App\Http\Controllers\ActividadesController::class, 'edit'])->name('actividades.edit');



//Fuentes
Route::get('/fuentes/crear/nuevo/{cod}', [App\Http\Controllers\FuentesController::class, 'index'])->name('fuentes.crear');
Route::get('/fuentes/show/{cod}', [App\Http\Controllers\FuentesController::class, 'show'])->name('fuentes.show');
Route::post('/fuentes/nuevo/obj', [App\Http\Controllers\FuentesController::class, 'store'])->name('fuentes.store');
Route::get('/fuentes/confirm/{id}',[App\Http\Controllers\FuentesController::class, 'destroyConfirm'])->name('fuentes.delete');
Route::post('/fuentes/update', [App\Http\Controllers\FuentesController::class, 'update'])->name('fuentes.update');
Route::delete('/fuentes/delete/{cod}',[App\Http\Controllers\FuentesController::class, 'destroy'])->name('fuentes.destroy');
Route::get('/fuentes/edit/{cod}',[App\Http\Controllers\FuentesController::class, 'edit'])->name('fuentes.edit');



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



//Convocatoria
Route::get('/convocatoria', [App\Http\Controllers\ConvocatoriaController::class, 'index'])->name('convocatoria.crear');
Route::get('/convocatoria/show', [App\Http\Controllers\ConvocatoriaController::class, 'show'])->name('convocatoria.show');
Route::post('/convocatoria/nuevo/store', [App\Http\Controllers\ConvocatoriaController::class, 'store'])->name('convocatoria.store');



//Colaboradores
Route::get('/colaboradores/crear/{cod}', [App\Http\Controllers\ColaboradoresController::class, 'index'])->name('colaboradores.crear');
Route::get('/colaboradores/show/{cod}', [App\Http\Controllers\ColaboradoresController::class, 'show'])->name('colaboradores.show');
Route::post('/colaboradores/nuevo/obj', [App\Http\Controllers\ColaboradoresController::class, 'store'])->name('colaboradores.store');
Route::get('/colaboradores/confirm/{id}',[App\Http\Controllers\ColaboradoresController::class, 'destroyConfirm'])->name('colaboradores.confirm');
Route::post('/colaboradores/update', [App\Http\Controllers\ColaboradoresController::class, 'update'])->name('colaboradores.update');
Route::delete('/colaboradores/delete/{cod}',[App\Http\Controllers\ColaboradoresController::class, 'destroy'])->name('colaboradores.destroy');
Route::get('/colaboradores/edit/{cod}',[App\Http\Controllers\ColaboradoresController::class, 'edit'])->name('colaboradores.edit');


//Catalogos
Route::get('/catalogos/areas', [App\Http\Controllers\CatalogosController::class, 'indexAreas'])->name('areas.crear');
Route::get('/catalogos/areas/show', [App\Http\Controllers\CatalogosController::class, 'showAreas'])->name('areas.show');

//Catalogos
Route::get('/catalogos/actividades', [App\Http\Controllers\CatalogosController::class, 'indexActividades'])->name('actividadesTipo.crear');
Route::get('/catalogos/actividades/show', [App\Http\Controllers\CatalogosController::class, 'showActividades'])->name('actividadesTipo.show');

//Catalogos
Route::get('/catalogos/instituciones', [App\Http\Controllers\CatalogosController::class, 'indexInstituciones'])->name('instituciones.crear');
Route::get('/catalogos/instituciones/show', [App\Http\Controllers\CatalogosController::class, 'showInstituciones'])->name('instituciones.show');

//Catalogos
Route::get('/catalogos/recursos', [App\Http\Controllers\CatalogosController::class, 'indexRecursos'])->name('recursos.catalogos.crear');
Route::get('/catalogos/recursos/show', [App\Http\Controllers\CatalogosController::class, 'showRecursos'])->name('recursos.catalogos.show');

//Catalogos
Route::get('/catalogos/unidades', [App\Http\Controllers\CatalogosController::class, 'indexUnidades'])->name('unidades.crear');
Route::get('/catalogos/unidades/show', [App\Http\Controllers\CatalogosController::class, 'showUnidades'])->name('unidades.show');

//Catalogos
Route::get('/catalogos/facultades', [App\Http\Controllers\CatalogosController::class, 'indexFacultades'])->name('facultades.crear');
Route::get('/catalogos/facultades/show', [App\Http\Controllers\CatalogosController::class, 'showFacultades'])->name('facultades.show');

//Catalogos
Route::get('/catalogos/tipopublicaciones', [App\Http\Controllers\CatalogosController::class, 'indexTipopublicaciones'])->name('tipopublicaciones.crear');
Route::get('/catalogos/tipopublicaciones/show', [App\Http\Controllers\CatalogosController::class, 'showTipopublicaciones'])->name('tipopublicaciones.show');




//Presupuesto
Route::get('/presupuesto/show/menu/{cod}', [App\Http\Controllers\PresupuestoController::class, 'showPresupuesto'])->name('presupuesto.menu.show');


//Inventario
Route::get('/inventario', [App\Http\Controllers\InventarioController::class, 'index'])->name('inventario.crear');
Route::get('/inventario/show', [App\Http\Controllers\InventarioController::class, 'show'])->name('inventario.show');
Route::post('/inventario/nuevo/producto', [App\Http\Controllers\InventarioController::class, 'store'])->name('inventario.store');
Route::get('/inventario/confirm/{codinventario}',[App\Http\Controllers\InventarioController::class, 'destroyConfirm'])->name('inventario.confirm');
Route::delete('/inventario/delete/{codinventario}',[App\Http\Controllers\InventarioController::class, 'destroy'])->name('inventario.destroy');
Route::get('/inventario/edit/{codinventario}',[App\Http\Controllers\InventarioController::class, 'edit'])->name('inventario.edit');
Route::post('/inventario/update', [App\Http\Controllers\InventarioController::class, 'update'])->name('inventario.update');
Route::get('/inventario/details/{codinventario}',[App\Http\Controllers\InventarioController::class, 'details'])->name('inventario.details');




