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
        //listando los proyectos
        $actividadesProyectos = Proyecto::all();
        return view('actividadesProyectos.index')
            ->with(
                'actividadesProyectos',
                $actividadesProyectos
            );
    }

    public function create()
    {
        //definicion de los modelos a usar
        $investigadores = Investigador::all();
        $areas = AreaDeConocimiento::all();
        $lineas = LineaDeInvestigacion::all();
        $facultades = Facultad::all();
        return view(
            'actividadesProyectos.create',
            compact(
                'investigadores',
                'areas',
                'lineas',
                'facultades',
            )
        );
    }

    public function store(Request $request)
    {
        //validacion de datos del proyecto
        $request->validate([
            'nombre_proyecto' => 'required|unique:proyectos,nombre_proyecto|string|min:50|max:150',
            'descripcion_proyecto' => 'required|string|min:50|max:150',
            'codigo_proyecto_sicues' => 'required|string|min:10|max:25',
            'codigo_proyecto_facultad' => 'required|string|min:10|max:25',
            'fecha_inicio_proyecto' => 'required|date',
            'fecha_fin_proyecto' => 'required|date|after_or_equal:fecha_inicio_proyecto',
            'titulo_objetivo' => 'required|string|min:50|max:150',
            'descripcion_objetivo' => 'required|string|min:50|max:300'
        ]);
        // Crear un nuevo ObjetivoProyecto
        $objetivo = new ObjetivoProyecto();
        $objetivo->titulo_objetivo = $request->input('titulo_objetivo');
        $objetivo->descripcion_objetivo = $request->input('descripcion_objetivo');
        // Guardar el Objetivo del Proyecto en la base de datos
        $objetivo->save();
        // Crear un nuevo investigador y asociarlo a la persona guardada
        $actividadProyecto = new Proyecto();
        // Asociar el ID del objetivo
        $actividadProyecto->id_objetivo = $objetivo->id_objetivo;
        $actividadProyecto->id_area_conocimiento = $request->input('id_area_conocimiento');
        $actividadProyecto->id_l_de_invest = $request->input('id_l_de_invest');
        $actividadProyecto->id_facultad = $request->input('id_facultad');
        $actividadProyecto->id_invest = $request->input('id_invest');
        $actividadProyecto->fecha_inicio_proyecto = $request->input('fecha_inicio_proyecto');
        $actividadProyecto->fecha_fin_proyecto = $request->input('fecha_fin_proyecto');

        // Guardar el proyecto en la base de datos
        $actividadProyecto->save();

        // Redireccionar a la vista de investigadores
        return redirect('activididadesProyectos');
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
        //
    }
}
