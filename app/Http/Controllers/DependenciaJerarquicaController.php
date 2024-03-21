<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DependenciaJerarquica;
use Illuminate\Support\Facades\Validator;

class DependenciaJerarquicaController extends Controller
{

    public function index()
    {
        $dependenciasJerarquicas = DependenciaJerarquica::all();
        return view('CapacidadesInstitucionales.DependenciaJerarquica.index',compact('dependenciasJerarquicas'));
    }


    public function create()
    {
        return view('CapacidadesInstitucionales.DependenciaJerarquica.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'descrip_dep_jerar' => 'required|string|max:300',
            'nombre_dep_jerar' => 'required|string|max:150'
        ]);

        if ($validator->fails()) {
            return redirect()->route('dependenciaJerarquica.create')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        DependenciaJerarquica::create($data);

        return redirect()->route('dependenciaJerarquica.index')->with('success','Nueva tarea creada exitosametne');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $depJerar = DependenciaJerarquica::find($id);
        return view('CapacidadesInstitucionales.DependenciaJerarquica.edit',compact('depJerar'));
    }


    public function update(Request $request, $id)
    {
        $depJerar = DependenciaJerarquica::find($id);

        $validator = Validator::make($request->all(), [
            'descrip_dep_jerar' => 'required|string|max:300',
            'nombre_dep_jerar' => 'required|string|max:150'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('dependenciaJerarquica.edit', ['dependenciaJerarquica' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        if (!$depJerar) {
            return redirect()->route('dependenciaJerarquica.index')->with('error', 'Dependencia no encontrada');
        } else {
            $depJerar->update($request->all());
            return redirect()->route('dependenciaJerarquica.index')->with('success','Nueva tarea editada exitosametne');
        }
    }


    public function destroy($id)
    {
        $depJerar = DependenciaJerarquica::find($id);

        if (!$depJerar) {
            return redirect()->route('dependenciaJerarquica.index')->with('error', 'La dependencia jerarquica no existe.');
        } else {
            $depJerar->delete();
            return redirect()->route('dependenciaJerarquica.index')->with('success', 'La dependencia ha sido eliminada correctamente.');
        }        
    }
}
