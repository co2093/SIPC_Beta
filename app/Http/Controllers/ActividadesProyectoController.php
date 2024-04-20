<?php

namespace App\Http\Controllers;

use App\Models\AreaDeConocimiento;
use App\Models\Investigador;
use App\Models\Proyecto;
use App\Models\LineaDeInvestigacion;
use App\Models\ActividadDeProyecto;
use App\Models\Facultad;
use App\Models\ObjetivoProyecto;
use Illuminate\Http\Request;

class ActividadesProyectoController extends Controller
{

    public function index()
    {
        //$actividadesProyectos = Proyecto::all();
        $actividadesProyectos = Proyecto::with('proyectosInvest.personasInvestigadores')->get();
        return view('actividadesProyectos.index', compact('actividadesProyectos'));
    }
    public function create()
    {
        // Obtener todos los investigadores, áreas, líneas y facultades
        $investigadores = Investigador::all();
        $areas = AreaDeConocimiento::all();
        $lineas = LineaDeInvestigacion::all();
        $facultades = Facultad::all();

        // Retornar la vista de creación con los datos necesarios
        return view('actividadesProyectos.create', compact('investigadores', 'areas', 'lineas', 'facultades'));
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_proyecto' => 'required|string|unique:proyectos,nombre_proyecto|max:150',
            'descripcion_proyecto' => 'required|string|max:150',
            'codigo_proyecto_sicues' => 'required|unique:proyectos,codigo_proyecto_sicues|string|min:10|max:25',
            'codigo_proyecto_facultad' => 'required|unique:proyectos,codigo_proyecto_facultad|string|min:10|max:25',
            'fecha_inicio_proyecto' => 'required|date',
            'fecha_fin_proyecto' => 'required|date|after_or_equal:fecha_inicio_proyecto',
            'titulo_objetivo' => 'required|string|unique:objetivos_de_proyecto,titulo_objetivo|min:25|max:150',
            'descripcion_objetivo' => 'required|unique:objetivos_de_proyecto,descripcion_objetivo|string|min:25|max:300',
        ]);

        // Crear un nuevo objetivo de proyecto
        $objetivo = new ObjetivoProyecto();
        $objetivo->titulo_objetivo = $request->input('titulo_objetivo');
        $objetivo->descripcion_objetivo = $request->input('descripcion_objetivo');
        $objetivo->save();

        // Crear un nuevo proyecto
        $actividadProyecto = new Proyecto();
        $actividadProyecto->nombre_proyecto = $request->input('nombre_proyecto');
        $actividadProyecto->descripcion_proyecto = $request->input('descripcion_proyecto');
        $actividadProyecto->codigo_proyecto_sicues = $request->input('codigo_proyecto_sicues');
        $actividadProyecto->codigo_proyecto_facultad = $request->input('codigo_proyecto_facultad');
        $actividadProyecto->fecha_inicio_proyecto = $request->input('fecha_inicio_proyecto');
        $actividadProyecto->fecha_fin_proyecto = $request->input('fecha_fin_proyecto');
        // Asignar el id del objetivo al proyecto
        $actividadProyecto->id_objetivo = $objetivo->id_objetivo;
        $actividadProyecto->id_area_conocimiento = $request->input('id_area_conocimiento');
        $actividadProyecto->id_l_de_invest = $request->input('id_l_de_invest');
        $actividadProyecto->id_facultad = $request->input('id_facultad');
        $actividadProyecto->id_invest = $request->input('id_invest');
        //dd($request->id_invest);
        $actividadProyecto->save();
        // Redireccionar a la vista de proyectos
        return redirect('actividadesProyectos');
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        // Buscar el proyecto por su ID
        $actividadProyecto = Proyecto::find($id);

        // Verificar si se encontró el proyecto
        if (!$actividadProyecto) {
            // Manejar el caso en que el proyecto no existe
            abort(404, 'Proyecto no encontrado');
        }

        // Obtener el objetivo asociado al proyecto, si existe
        $objetivo = $actividadProyecto->proyectosObjetivos;

        // Obtener todos los investigadores, áreas, líneas y facultades
        $investigadores = Investigador::all();
        $areas = AreaDeConocimiento::all();
        $lineas = LineaDeInvestigacion::all();
        $facultades = Facultad::all();

        // Retornar la vista de edición con los datos necesarios
        return view('actividadesProyectos.edit', compact(
            'actividadProyecto',
            'objetivo',
            'investigadores',
            'areas',
            'lineas',
            'facultades'
        ));
    }

    public function update(Request $request, $id)
    {
        // Buscar el proyecto por su ID
        $actividadProyecto = Proyecto::find($id);

        // Verificar si se encontró el proyecto
        if (!$actividadProyecto) {
            // Manejar el caso en que el proyecto no existe
            abort(404, 'Proyecto no encontrado');
        }

        // Obtener el objetivo asociado al proyecto, si existe
        $objetivo = $actividadProyecto->proyectosObjetivos;

        // Verificar si existe el objetivo
        if (!$objetivo) {
            // Manejar el caso en que el objetivo no existe
            abort(404, 'Objetivo no encontrado');
        }

        // Actualizar las propiedades del objetivo
        $objetivo->titulo_objetivo = $request->input('titulo_objetivo');
        $objetivo->descripcion_objetivo = $request->input('descripcion_objetivo');
        $objetivo->save();

        // Actualizar las propiedades del proyecto
        $actividadProyecto->nombre_proyecto = $request->input('nombre_proyecto');
        $actividadProyecto->descripcion_proyecto = $request->input('descripcion_proyecto');
        $actividadProyecto->codigo_proyecto_sicues = $request->input('codigo_proyecto_sicues');
        $actividadProyecto->codigo_proyecto_facultad = $request->input('codigo_proyecto_facultad');
        $actividadProyecto->fecha_inicio_proyecto = $request->input('fecha_inicio_proyecto');
        $actividadProyecto->fecha_fin_proyecto = $request->input('fecha_fin_proyecto');
        $actividadProyecto->id_area_conocimiento = $request->input('id_area_conocimiento');
        $actividadProyecto->id_l_de_invest = $request->input('id_l_de_invest');
        $actividadProyecto->id_facultad = $request->input('id_facultad');
        $actividadProyecto->id_invest = $request->input('id_invest');

        // Guardar los cambios en el proyecto
        $actividadProyecto->save();

        // Redireccionar a la vista de proyectos
        return redirect()->route('actProHome')->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy($id)
    {
        // Encontrar el proyecto a eliminar
        $actividadProyecto = Proyecto::find($id);

        // Verificar si se encontró el proyecto
        if (!$actividadProyecto) {
            // Manejar el caso en que el proyecto no existe
            abort(404, 'proyecto no encontrado');
        }

        // Eliminar al proyecto de la base de datos
        $actividadProyecto->delete();

        // Redireccionar a la vista de proyectoes
        return redirect('actividadesProyectos')->with('success', 'proyecto eliminado correctamente');
    }
}
