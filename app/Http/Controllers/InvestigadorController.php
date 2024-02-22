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
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Pais;

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
        // definicion de los modelos que se emplearan para el consumo de datos y registro de 
        // investigadores
        $grados_academicos = GradoAcademico::all();
        $carreras = Carrera::all();
        $unidades = UnidadInvestigacion::all();
        $rrhh = UnidadRecursosHumanos::all();
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $capacitaciones = Capacitacion::all();
        return view(
            'investigadores.create',
            compact(
                'grados_academicos',
                'carreras',
                'unidades',
                'rrhh',
                'paises',
                'departamentos',
                'municipios',
                'capacitaciones'
            )
        );
    }

    public function store(Request $request)
    {
        // Crear una nueva persona
        $persona = new Persona();
        $persona->nombre_persona = $request->input('nombre_persona');
        $persona->apellido_persona = $request->input('apellido_persona');
        $persona->telefono_persona = $request->input('telefono_persona');
        $persona->correo_persona = $request->input('correo_persona');
        $persona->genero_persona = $request->input('genero_persona');
        $persona->direccion_persona = $request->input('direccion_persona');
        $persona->id_pais = $request->input('id_pais');
        // Guardar la persona en la base de datos
        $persona->save();

        // Crear un nuevo investigador y asociarlo a la persona guardada
        $investigador = new Investigador();
        $investigador->acronimo = $request->input('acronimo');
        $investigador->id_persona = $persona->id_persona; // Asociar el ID de la persona creada
        $investigador->id_carrera = $request->input('id_carrera');
        $investigador->id_g_acad = $request->input('id_g_acad');
        $investigador->id_unidad = $request->input('id_unidad');
        $investigador->id_unidad_rrhh = $request->input('id_unidad_rrhh');
        $investigador->id_cap = $request->input('id_cap');
        // Guardar el investigador en la base de datos
        $investigador->save();

        // Redireccionar a la vista de investigadores
        return redirect('investigadores');
    }

    public function show($id)
    {
        // Implementar si es necesario
    }

    public function edit($id)
    {
        // Buscar el investigador por su ID
        $investigador = Investigador::find($id);
    
        // Verificar si el investigador existe
        if (!$investigador) {
            return redirect()->route('investigadores.index')->with('error', 'Investigador no encontrado');
        }
    
        // Obtener los datos necesarios para el formulario de edición
        $grados_academicos = GradoAcademico::all();
        $carreras = Carrera::all();
        $unidades = UnidadInvestigacion::all();
        $rrhh = UnidadRecursosHumanos::all();
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $capacitaciones = Capacitacion::all();
    
        // Obtener los datos de la persona asociada al investigador
        $persona = $investigador->personasInvestigadores;
    
        // Devolver la vista de edición con los datos del investigador, la persona y las opciones para los campos
        return view('investigadores.edit', compact(
            'investigador',
            'persona',
            'grados_academicos',
            'carreras',
            'unidades',
            'rrhh',
            'paises',
            'departamentos',
            'municipios',
            'capacitaciones'
        ));
    }
    
    public function update(Request $request, $id)
    {
        // Buscar el investigador por su ID
        $investigador = Investigador::find($id);
    
        // Verificar si el investigador existe
        if (!$investigador) {
            return redirect()->route('investigadores.index')->with('error', 'Investigador no encontrado');
        }
    
        // Actualizar los datos del investigador
        $investigador->acronimo = $request->input('acronimo');
        $investigador->id_carrera = $request->input('id_carrera');
        $investigador->id_g_acad = $request->input('id_g_acad');
        $investigador->id_unidad = $request->input('id_unidad');
        $investigador->id_unidad_rrhh = $request->input('id_unidad_rrhh');
        $investigador->id_cap = $request->input('id_cap');
        $investigador->save();
    
        // Redireccionar a la vista de investigadores con un mensaje de éxito
        return redirect()->route('investigadores.index')->with('success', 'Investigador actualizado correctamente');
    }
    

    public function destroy($id)
    {
        // Encontrar el investigador a eliminar
        $investigador = Investigador::find($id);
        // Eliminar al investigador de la base de datos
        $investigador->delete();
        // Redireccionar a la vista de investigadores
        return redirect('investigadores');
    }
}
