<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\UnidadDeInvestigacion;
use App\Models\DependenciaJerarquica;
use App\Models\UnidadesRRFF;

class UnidadDeInvestigacionController extends Controller
{
    public function index()
    {
        $unidadesDeInvestigacion = UnidadDeInvestigacion::with('unidadesRRFF', 'dependenciaJerarquica')->get();
        return view('CapacidadesInstitucionales.UnidadDeInvestigacion.index', compact('unidadesDeInvestigacion'));
    }

    public function create()
    {
        $unidades_rrffs = UnidadesRRFF::all();
        $deps_jerarquicas = DependenciaJerarquica::all();

        return view('CapacidadesInstitucionales.UnidadDeInvestigacion.create', compact('unidades_rrffs', 'deps_jerarquicas'));
    }

    public function store(Request $request)
    {
        //VALIDACION DE LOS ATRIBUTOS DE LA TABLA DE UU_DE_INVESTIGACION.
        $validator = Validator::make($request->all(), [
            'nombre_unidad' => 'required|string|max:300',
            'fecha_fundacion' => 'required|date|before_or_equal:' . now()->toDateString(),
            'telefono_unidad' => 'required|string|max:8'
        ]);
        //VERIFICAR SI APLICA O NO LA VALIDACION
        if ($validator->fails()) {
            //SI ES CIERTO PERMITA REDIRECCIONAR A LA VISTA DE CREATE
            return redirect()->route('unidadesDeInvestigacion.create')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['id_form'] = "1";

        //dd($data); // Muestra los datos para verificar
        UnidadDeInvestigacion::create($data);
        //UnidadDeInvestigacion::create($request->all());

        return redirect()->route('unidadesDeInvestigacion.index')->with('success', 'Nueva tarea creada exitosametne');
    }
    /*
    public function show($id)
    {
        //
    }*/

    public function edit($id)
    {
        $unidad = UnidadDeInvestigacion::find($id);
        $unidades_rrffs = UnidadesRRFF::all();
        $deps_jerarquicas = DependenciaJerarquica::all();
        return view('CapacidadesInstitucionales.UnidadDeInvestigacion.edit', compact('unidad', 'unidades_rrffs', 'deps_jerarquicas'));
    }

    public function update(Request $request, $id)
    {
        $unidad = UnidadDeInvestigacion::find($id);

        $validator = Validator::make($request->all(), [
            'nombre_unidad' => 'required|string|max:300',
            'fecha_fundacion' => 'required|date|before_or_equal:' . now()->toDateString(),
            'telefono_unidad' => 'required|string|max:8'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('unidadesDeInvestigacion.edit', ['unidadesDeInvestigacion' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        if (!$unidad) {
            return redirect()->route('unidadesDeInvestigacion.index')->with('error', 'Unidad de investigación no encontrada');
        } else {
            $unidad->update($request->all());
            return redirect()->route('unidadesDeInvestigacion.index')->with('success', 'Nueva tarea editada exitosametne');
        }
    }

    public function destroy($id)
    {
        $unidad = UnidadDeInvestigacion::find($id);

        if (!$unidad) {
            return redirect()->route('unidadesDeInvestigacion.index')->with('error', 'La unidad de investigación no existe.');
        }

        $unidad->delete();

        return redirect()->route('unidadesDeInvestigacion.index')->with('success', 'La unidad de investigación ha sido eliminada correctamente.');
    }
}
