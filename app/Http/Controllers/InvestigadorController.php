<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//modelos a utilizar
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
use App\Models\Acronimo;
use App\Models\CierreFormulario;
use App\Models\ConsolidadoFormulario;
use App\Models\EstadoFormulario;
use App\Models\Formulario;
use App\Models\TipoFormulario;


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
        //campos adicionales de las nuevas entidades agregadas
        $acronimos = Acronimo::all();
        $formularios = Formulario::all();
        $t_formularios = TipoFormulario::all();
        $cierres = CierreFormulario::all();
        $consolidados = ConsolidadoFormulario::all();
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
                'capacitaciones',
                //datos extra
                'acronimos',
                'formularios',
                't_formularios',
                'cierres',
                'consolidados'
            )
        );
    }

    public function store(Request $request)
    {
        //definiendo los mensajes de error
        $messages = [
            'nombre_persona.required' => 'El :attribute es obligatorio.',
            'apellido_persona.required' => 'El :attribute es obligatorio.',
            'telefono_persona.required' => 'El :attribute es requerido',
            'telefono_persona.max' => 'El :attribure no debe ser mayor a :max numeros',
            'correo_persona.required' => 'El :attribute es requerido',
            'genero_persona.required' => 'El :attribute es requerido',
            'direccion_persona.required' => 'La :attribute es requerido',
            'edad_persona.required' => 'La :attribute es requerido',
            'id_pais.required' => 'El :attribute es requerido',
        ];        // Reemplazar :attribute con el nombre real del campo en el mensaje de error
        $attributes = [
            'nombre_persona' => 'nombre(s)',
            'apellido_persona' => 'apellido(s)',
            'telefono_persona' => 'teléfono',
            'correo_persona' => 'correo electrónico',
            'genero_persona' => 'género',
            'direccion_persona' => 'dirección',
            'edad_persona' => 'edad',
            'id_pais' => 'país',
        ];

        // Personalizar los mensajes de error con los nombres reales de los campos
        foreach ($messages as $key => $message) {
            $messages[$key] = str_replace(':attribute', $attributes[explode('.', $key)[0]], $message);
        }
        //validacion de datos
        $request->validate([
            'nombre_persona' => 'required|string|min:5|max:150',
            'apellido_persona' => 'required|string|min:5|max:150',
            'telefono_persona' => 'required|max:8',
            'correo_persona' => 'required',
            'genero_persona' => 'required',
            'direccion_persona' => 'required',
            'edad_persona' => 'required|numeric|min:18|max:120', // Ejemplo: edad debe ser mayor o igual a 18 y menor o igual a 120
            'id_pais' => 'required',
        ]);

        // Crear una nueva persona
        $persona = new Persona();
        $persona->nombre_persona = $request->input('nombre_persona');
        $persona->apellido_persona = $request->input('apellido_persona');
        $persona->telefono_persona = $request->input('telefono_persona');
        $persona->correo_persona = $request->input('correo_persona');
        $persona->genero_persona = $request->input('genero_persona');
        $persona->direccion_persona = $request->input('direccion_persona');
        $persona->edad_persona = $request->input('edad_persona');
        $persona->id_pais = $request->input('id_pais');
        // Guardar la persona en la base de datos
        $persona->save();

        // Crear un nuevo investigador y asociarlo a la persona guardada
        $investigador = new Investigador();
        $investigador->id_persona = $persona->id_persona; // Asociar el ID de la persona creada
        $investigador->id_carrera = $request->input('id_carrera');
        $investigador->id_g_acad = $request->input('id_g_acad');
        $investigador->id_unidad = $request->input('id_unidad');
        $investigador->id_unidad_rrhh = $request->input('id_unidad_rrhh');
        $investigador->id_cap = $request->input('id_cap');
        //datos adicionales de los acronimos de carrera y grado academico
        $investigador->car_id_acronimo = $request->input('car_id_acronimo');
        $investigador->id_acronimo = $request->input('id_acronimo');
        //informacion de la cabecera del formulario
        $investigador->id_form = $request->input('id_form');
        $investigador->id_t_form = $request->input('id_t_form');
        $investigador->id_consolidacion = $request->input('id_consolidacion');
        $investigador->id_cierre_periodo_ = $request->input('id_cierre_periodo_');
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

        // Verificar si se encontró el investigador
        if (!$investigador) {
            // Manejar el caso en que el investigador no existe
            abort(404, 'Investigador no encontrado');
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
        //datos adicionales
        $acronimos = Acronimo::all();
        $formularios = Formulario::all();
        $t_formularios = TipoFormulario::all();
        $cierres = CierreFormulario::all();
        $consolidados = ConsolidadoFormulario::all();
        // También obtener los datos de la persona asociada al investigador
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
            'capacitaciones',
            //datos extra
            'acronimos',
            'formularios',
            't_formularios',
            'cierres',
            'consolidados'
        ));
    }

    public function update(Request $request, $id)
    {

        // Buscar el investigador por su ID
        $investigador = Investigador::find($id);

        // Verificar si se encontró el investigador
        if (!$investigador) {
            // Manejar el caso en que el investigador no existe
            abort(404, 'Investigador no encontrado');
        }

        // Buscar la persona asociada al investigador
        $persona = $investigador->personasInvestigadores;

        // Verificar si se encontró la persona
        if (!$persona) {
            // Manejar el caso en que la persona asociada no existe
            abort(404, 'Persona asociada no encontrada');
        }

        // Actualizar los datos de la persona
        $persona->nombre_persona = $request->input('nombre_persona');
        $persona->apellido_persona = $request->input('apellido_persona');
        $persona->telefono_persona = $request->input('telefono_persona');
        $persona->correo_persona = $request->input('correo_persona');
        $persona->genero_persona = $request->input('genero_persona');
        $persona->direccion_persona = $request->input('direccion_persona');
        $persona->id_pais = $request->input('id_pais');

        // Guardar los cambios en la persona
        $persona->save();

        // Actualizar los datos del investigador
        $investigador->acronimo = $request->input('acronimo');
        $investigador->id_carrera = $request->input('id_carrera');
        $investigador->id_g_acad = $request->input('id_g_acad');
        $investigador->id_unidad = $request->input('id_unidad');
        $investigador->id_unidad_rrhh = $request->input('id_unidad_rrhh');
        $investigador->id_cap = $request->input('id_cap');
        //datos adicionales de los acronimos de carrera y grado academico
        $investigador->car_id_acronimo = $request->input('car_id_acronimo');
        $investigador->id_acronimo = $request->input('id_acronimo');
        //informacion de la cabecera del formulario
        $investigador->id_form = $request->input('id_form');
        $investigador->id_t_form = $request->input('id_t_form');
        $investigador->id_consolidacion = $request->input('id_consolidacion');
        $investigador->id_cierre_periodo_ = $request->input('id_cierre_periodo_');
        // Guardar los cambios en el investigador
        $investigador->save();

        // Redireccionar a la vista de investigadores
        return redirect('investigadores')->with('success', 'Investigador actualizado correctamente');
    }

    public function destroy($id)
    {
        // Encontrar el investigador a eliminar
        $investigador = Investigador::find($id);

        // Verificar si se encontró el investigador
        if (!$investigador) {
            // Manejar el caso en que el investigador no existe
            abort(404, 'Investigador no encontrado');
        }

        // Obtener el ID de la persona asociada al investigador
        $id_persona = $investigador->id_persona;

        // Eliminar al investigador de la base de datos
        $investigador->delete();

        // Verificar si se encontró el ID de la persona
        if ($id_persona) {
            // Buscar y eliminar la persona asociada si existe
            Persona::destroy($id_persona);
        }

        // Redireccionar a la vista de investigadores
        return redirect('investigadores')->with('success', 'Investigador eliminado correctamente');
    }
}
