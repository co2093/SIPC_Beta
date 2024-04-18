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
        $actividadesProyectos = Proyecto::all();
        return view(
            'actividadesProyectos.index'
        )->with(
            'actividadesProyectos',
            $actividadesProyectos

        );
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
            'nombre_proyecto' => 'required|string|max:150',
            'descripcion_proyecto' => 'required|string|max:150',
            'codigo_proyecto_sicues' => 'required|string|min:10|max:25',
            'codigo_proyecto_facultad' => 'required|string|min:10|max:25',
            'fecha_inicio_proyecto' => 'required|date',
            'fecha_fin_proyecto' => 'required|date|after_or_equal:fecha_inicio_proyecto',
            'titulo_objetivo' => 'required|string|min:25|max:150',
            'descripcion_objetivo' => 'required|string|min:25|max:300'
        ]);

        // Crear un nuevo objetivo de proyecto
        $objetivo = new ObjetivoProyecto();
        $objetivo->titulo_objetivo = $request->input('titulo_objetivo');
        $objetivo->descripcion_objetivo = $request->input('descripcion_objetivo');
        $objetivo->save();

        // Crear un nuevo proyecto
        $proyecto = new Proyecto();
        $proyecto->nombre_proyecto = $request->input('nombre_proyecto');
        $proyecto->descripcion_proyecto = $request->input('descripcion_proyecto');
        $proyecto->codigo_proyecto_sicues = $request->input('codigo_proyecto_sicues');
        $proyecto->codigo_proyecto_facultad = $request->input('codigo_proyecto_facultad');
        $proyecto->fecha_inicio_proyecto = $request->input('fecha_inicio_proyecto');
        $proyecto->fecha_fin_proyecto = $request->input('fecha_fin_proyecto');
        // Asignar el id del objetivo al proyecto
        $proyecto->id_objetivo = $objetivo->id_objetivo;
        $proyecto->id_area_conocimiento = $request->input('id_area_conocimiento');
        $proyecto->id_l_de_invest = $request->input('id_l_de_invest');
        $proyecto->id_facultad = $request->input('id_facultad');
        $proyecto->id_invest = $request->input('id_invest');
        //dd($request->id_invest);
        $proyecto->save();
        // Redireccionar a la vista de proyectos
        return redirect('actividadesProyectos');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        // Encontrar el proyecto a eliminar
        $proyecto = Proyecto::find($id);

        // Verificar si se encontró el proyecto
        if (!$proyecto) {
            // Manejar el caso en que el proyecto no existe
            abort(404, 'proyecto no encontrado');
        }

        // Eliminar al proyecto de la base de datos
        $proyecto->delete();

        // Redireccionar a la vista de proyectoes
        return redirect('actividadesProyectos')->with('success', 'proyecto eliminado correctamente');
    }
}
