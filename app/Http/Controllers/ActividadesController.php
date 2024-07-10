<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Auth;

class ActividadesController extends Controller
{
    //

    public function index($cod)
    {

        $obj = DB::table('objetivo')
        ->where('idproyecto', '=', $cod)
        ->where('tipo', '=', 2)
        ->get();

        $tipo = DB::table('tipo_actividad')
        ->get();

        return view('actividades.index', compact('cod', 'obj', 'tipo'));
    }



    public function show($cod)
    {


        $act = DB::table('actividad')
        ->leftjoin('objetivo', 'objetivo.idobjetivo', '=', 'actividad.idobjetivo')
        ->leftjoin('tipo_actividad', 'actividad.idtipoactividad','=','tipo_actividad.idtipoactividad')
        ->select('actividad.*', 'objetivo.descripcion', 'tipo_actividad.nombretipoactividad')
        ->where('actividad.idproyecto', '=', $cod)
        ->get();

      




        return view('actividades.show', compact('cod', 'act'));
    }



    public function store(Request $request){

//            dd($request); 
            DB::table('actividad')->insert([
                'idtipoactividad' => $request->input('tipo'),
                'idobjetivo' => $request->input('objetivo'),
                'idproyecto' => $request->input('cod'),
                'idestadoactividad' => 1,
                'nombreactividad' =>$request->input('actividad'),
                'fechainicioactividad' =>$request->input('inicio'),
                'fechafinactividad' =>$request->input('final')
            ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado la actividad');

        return redirect()->to('/actividades/show/'.$request->input('cod'));

    }    




    public function edit($cod)
    {
        //dd($codinventario);
        $act = DB::table('actividad')
        ->where('idactividad', '=', $cod)
        ->first();

        $obj = DB::table('objetivo')
        ->where('idproyecto', '=', $act->idproyecto)
        ->where('tipo', '=', 2)
        ->get();

        $tipo = DB::table('tipo_actividad')
        ->get();

        $tp = DB::table('tipo_actividad')
        ->where('idtipoactividad', '=', $act->idtipoactividad)
        ->first();

        $obje = DB::table('objetivo')
        ->where('idobjetivo', '=', $act->idobjetivo)
        ->first();



        return view('actividades.edit', compact('act', 'tipo', 'obj', 'tp', 'obje'));
    }



     public function update(Request $request)
    {

       // dd($request);

        DB::table('actividad')
        ->where('idactividad', $request->input('idactividad'))
        ->update([
            'idobjetivo' => $request->input('objetivo'),
            'nombreactividad' => $request->input('actividad'),
            'idtipoactividad' => $request->input('tipo'),
            'fechainicioactividad' => $request->input('inicio'),
            'fechafinactividad' => $request->input('fin')

        ]);


                

        session()->flash('success', 'Actividad actualizada exitosamente');
        return redirect()->to('/actividades/show/'.$request->input('cod'));

    }


    public function destroyConfirm($id)
    {

        $act = DB::table('actividad')
        ->where('idactividad', '=', $id)
        ->first();

        $tp = DB::table('tipo_actividad')
        ->where('idtipoactividad', '=', $act->idtipoactividad)
        ->first();

        $obje = DB::table('objetivo')
        ->where('idobjetivo', '=', $act->idobjetivo)
        ->first();

        

        return view('actividades.delete', compact('act', 'obje', 'tp'));
    }



    public function destroy($cod)
    {

        $act = DB::table('actividad')
        ->where('idactividad', '=', $cod)
        ->first();


        //dd($codinventario);
         $acti = DB::table('actividad')
        ->where('idactividad', '=', $cod)
        ->delete();



        session()->flash('success', 'Actividad eliminada exitosamente');
        return redirect()->to('/actividades/show/'.$act->idproyecto);
    }
}
