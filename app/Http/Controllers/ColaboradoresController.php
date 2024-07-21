<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Auth;

class ColaboradoresController extends Controller
{
    
    //
    public function index($cod)
    {
        $facultades = DB::table('facultad')
        ->get();

        $tipo = DB::table('tipocolaborador')
        ->get();


        return view('colaboradores.index', compact('cod', 'facultades', 'tipo'));
    }



    public function show($cod)
    {

        $colaboradores = DB::table('colaboradores')
        ->where('idproyecto', '=', $cod)
        ->get();

        $facultades = DB::table('facultad')
        ->get();

        $tipo = DB::table('tipocolaborador')
        ->get();

        return view('colaboradores.show', compact('cod', 'colaboradores', 'facultades', 'tipo'));
    }


    public function store(Request $request){

//            dd($request); 
            DB::table('colaboradores')->insert([
                'nombrecompleto' => $request->input('nombre'),
                'adhonorem' => $request->input('adhonorem'),
                'idproyecto' => $request->input('cod'),
                'idfacultad' => $request->input('facultad'),
                'idtipocolaborador' =>$request->input('tipo'),
                'sexo' =>$request->input('sexo')
            ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado el colaborador del proyecto');

        return redirect()->to('/colaboradores/show/'.$request->input('cod'));

    }    




    public function edit($id)
    {
        //dd($codinventario);
        $col = DB::table('colaboradores')
        ->where('idcolaborador', '=', $id)
        ->first();

        $facultades = DB::table('facultad')
        ->get();

        $tipo = DB::table('tipocolaborador')
        ->get();

        $tp = DB::table('tipocolaborador')
        ->where('idtipo', '=', $col->idtipocolaborador)
        ->first();

        $facu = DB::table('facultad')
        ->where('idfacultad', '=', $col->idfacultad)
        ->first();


        return view('colaboradores.edit', compact('col', 'facultades', 'tipo', 'facu', 'tp'));
    }



     public function update(Request $request)
    {

       // dd($request);

        DB::table('colaboradores')
        ->where('idcolaborador', $request->input('cod'))
        ->update([
            'nombrecompleto' => $request->input('nombre'),
            'adhonorem' => $request->input('adhonorem'),
            'idfacultad' => $request->input('facultad'),
            'idtipocolaborador' => $request->input('tipo'),
            'sexo' => $request->input('sexo')

        ]);


                

        session()->flash('success', 'Colaborador actualizado exitosamente');
        return redirect()->to('/colaboradores/show/'.$request->input('idproyecto'));

    }

    public function destroyConfirm($id)
    {
        $col = DB::table('colaboradores')
        ->where('idcolaborador', '=', $id)
        ->first();

        $tp = DB::table('tipocolaborador')
        ->where('idtipo', '=', $col->idtipocolaborador)
        ->first();

        $facu = DB::table('facultad')
        ->where('idfacultad', '=', $col->idfacultad)
        ->first();


        

        return view('colaboradores.delete', compact('col', 'facu', 'tp'));
    }



    public function destroy($cod)
    {

        $col = DB::table('colaboradores')
        ->where('idcolaborador', '=', $cod)
        ->first();

        //dd($codinventario);
         $cola = DB::table('colaboradores')
        ->where('idcolaborador', '=', $cod)
        ->delete();



        session()->flash('success', 'Colaborador eliminado exitosamente');
        return redirect()->to('/colaboradores/show/'.$col->idproyecto);
    }

    public function end($cod){


        DB::table('pasos_registro')
        ->where('idproyecto', $cod)
        ->update([
            'colaboradores' => 1    

        ]);

        session()->flash('success', 'Colaboradores completados.');
        return redirect()->to('/projects/registro/pasos/'.$cod);

    }


}
