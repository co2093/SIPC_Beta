<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investigador;
use App\Models\Capacitacion;
use App\Models\Carrera;
use App\Models\GradoAcademico;
use App\Models\Persona;
use App\Models\UnidadInvestigacion;
use App\Models\UnidadRecursosHumanos;

class InvestigadorController extends Controller
{
    public function index()
    {
        $investigadores = Investigador::all();
        return view('investigadores.index')
            ->with(
                'investigadores',
                $investigadores
            );
    }

    public function create()
    {
        //definicion de los modelos que se emplearan para el consumo de datos y registro de 
        //investigadores
        $grados_academicos = GradoAcademico::all();
        $carreras = Carrera::all();
        $unidades = UnidadInvestigacion::all();
        $rrhh=UnidadRecursosHumanos::all();
        return view(
            'investigadores.create',
            compact(
                'grados_academicos',
                'carreras',
                'unidades',
                'rrhh'
            )
        );
    }

    public function store(Request $request)
    {
        //creando el objeto de investigador
        $investigadores = new Investigador();
        //definiendo el objeto de persona
        $persona = new Persona();
        //definiendo datos de persona
        $persona->nombre_persona = $request->get('nombre_persona');
        $persona->apellido_persona = $request->get('apellido_persona');
        $persona->telefono_persona = $request->get('telefono_persona');
        $persona->correo_persona = $request->get('correo_persona');
        $persona->genero = $request->get('genero');
        $persona->direccion_persona = $request->get('direccion_persona');
        //definiendo los elementos que conforman al investigador
        $investigadores->acronimo = $request->get('acronimo');
        $investigadores->id_persona = $request->get('id_persona');
        $investigadores->id_carrera = $request->get('id_carrera');
        $investigadores->id_g_acad = $request->get('id_g_acad');
        $investigadores->id_unidad=$request->get('id_unidad');
        $investigadores->id_unidad_rrhh=$request->get('id_unidad_rrhh');
        //guardando los elementos
        $investigadores->save();
        //redireccionando
        return redirect('investigadores');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        return view('investigadores.edit');
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
