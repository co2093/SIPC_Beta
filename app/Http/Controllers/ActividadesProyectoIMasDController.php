<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\ActividadDeProyecto;

class ActividadesProyectoIMasDController extends Controller
{

    public function index()
    {
        //listar las actividades de los proyectos
        $actividadesIMasD=ActividadDeProyecto::all();
        return view('actividadesIMasD.index')->with('actividadesIMasD',$actividadesIMasD);
    }
    public function create()
    {
        //Lista de proyectos disponibles
        $proyectos=Proyecto::all();
        return view(
        'actividadesIMasD.create',
        compact('proyectos'));
    }
    public function store(Request $request)
    {
        //validacion de datos
        $request->validate([
            'nombre_actividad' => 'required|string|min:5|max:150',
            'descripcion_actividad' => 'required|string|min:5|max:150',
            'fecha_inicio_actividad' => 'required|date',
            'fecha_fin_actividad' => 'required|date|after_or_equal:fecha_inicio_actividad',
        ]);
        $actividadIMasD=new ActividadDeProyecto();
        $actividadIMasD->nombre_actividad = $request->input('nombre_actividad');
        $actividadIMasD->descripcion_actividad = $request->input('descripcion_actividad');
        $actividadIMasD->fecha_inicio_actividad = $request->input('fecha_inicio_actividad');
        $actividadIMasD->fecha_fin_actividad = $request->input('fecha_fin_actividad');
        $actividadIMasD->id_proyecto = $request->input('id_proyecto');
        $actividadIMasD->save();
        return redirect('actividadesIMasD');

    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
          // Buscar la actividad por su ID
        $actividadIMasD = ActividadDeProyecto::find($id);

        // Verificar si se encontró el investigador
        if (!$actividadIMasD) {
            // Manejar el caso en que el investigador no existe
            abort(404, 'Actividad no encontrada');
        }
        $proyectos=Proyecto::all();
        return view('actividadesIMasD.edit', compact(
            'actividadIMasD',
            'proyectos',
        ));
    }
    public function update(Request $request, $id)
    {
        $actividadIMasD->nombre_actividad = $request->input('nombre_actividad');
        $actividadIMasD->descripcion_actividad = $request->input('descripcion_actividad');
        $actividadIMasD->fecha_inicio_actividad = $request->input('fecha_inicio_actividad');
        $actividadIMasD->fecha_fin_actividad = $request->input('fecha_fin_actividad');
        $actividadIMasD->id_proyecto = $request->input('id_proyecto');
        $actividadIMasD->save();
        return redirect('actividadesIMasD');
    }
    public function destroy($id)
    {
        // Encontrar la ActividadDeProyecto a eliminar
        $actividadIMasD = ActividadDeProyecto::find($id);

        // Verificar si se encontró el ActividadDeProyecto
        if (!$actividadIMasD) {
            // Manejar el caso en que el ActividadDeProyecto no existe
            abort(404, 'Actividad de Proyecto no encontrada');
        }
        // Eliminar al ActividadDeProyecto de la base de datos
        $actividadIMasD->delete();
        // Redireccionar a la vista de ActividadDeProyectoes
        return redirect('actividadesIMasD')->with('success', 'Actividad del Proyecto eliminada correctamente');
    }
}
