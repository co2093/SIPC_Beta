<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Auth;


class RecursosController extends Controller
{
    //
    public function index($cod)
    {

        $actividades = DB::table('actividad')
        ->where('idproyecto', '=', $cod)
        ->get();

        $unidades = DB::table('unidad_medida')
        ->get();

        $tipo = DB::table('tipo_recurso')
        ->get();


        $fuentes = DB::table('pre_fuente')
        ->where('idproyecto', '=', $cod)
        ->get();

        return view('recursos.index', compact('cod', 'actividades', 'unidades', 'tipo', 'fuentes'));
    }



    public function show($cod)
    {
        $recursos = DB::table('pre_recurso')
        ->join('unidad_medida', 'pre_recurso.idunidadmedida', '=', 'unidad_medida.idunidadmedida')
        ->join('tipo_recurso', 'pre_recurso.idtiporecurso', '=', 'tipo_recurso.idtiporecurso')
        ->select('pre_recurso.*', 'unidad_medida.nombreunidadmedida', 'tipo_recurso.nombretiporecurso')    
        ->where('pre_recurso.idproyecto', '=', $cod)
        ->get();

    //        dd($recursos);


        return view('recursos.show', compact('cod', 'recursos'));
    }


    public function store(Request $request){

           //dd($request); 
            DB::table('pre_recurso')->insert([
                'idtiporecurso' => $request->input('tiporecurso'),
                'idunidadmedida' => $request->input('unidad'),
                'idfuente' => $request->input('idfuente'),
                'idproyecto' => $request->input('cod'),
                'nombrerecurso' => $request->input('nombre'),
                'especificacionestecnicas' => $request->input('especificaciones'),
                'preciorecurso' => $request->input('costo'),
                'cantidadrecurso' => $request->input('cantidad'),
                'subtotalrecurso' => $request->input('costo')*$request->input('cantidad'),
                'idactividad' => $request->input('idactividad')
                


            ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado el recurso.');

        return redirect()->to('/recursos/show/'.$request->input('cod'));

    }



    public function edit($cod)
    {
        //dd($codinventario);
        $recurso = DB::table('pre_recurso')
        ->join('unidad_medida', 'pre_recurso.idunidadmedida', '=', 'unidad_medida.idunidadmedida')
        ->join('tipo_recurso', 'pre_recurso.idtiporecurso', '=', 'tipo_recurso.idtiporecurso')
        ->join('actividad', 'actividad.idactividad', '=', 'pre_recurso.idactividad')
        ->select('pre_recurso.*', 'unidad_medida.nombreunidadmedida', 'tipo_recurso.nombretiporecurso', 'actividad.idproyecto')    
        ->where('pre_recurso.idrecurso', '=', $cod)
        ->first();


        $actividades = DB::table('actividad')
        ->where('idproyecto', '=', $recurso->idproyecto)
        ->get();

        $unidades = DB::table('unidad_medida')
        ->get();

        $tipo = DB::table('tipo_recurso')
        ->get();


        $fuentes = DB::table('pre_fuente')
        ->where('idproyecto', '=', $recurso->idproyecto)
        ->get();

      //  dd($recurso);


        return view('recursos.edit', compact('recurso', 'actividades', 'unidades', 'tipo', 'fuentes'));
    }    


    public function update(Request $request)
    {


       
          DB::table('pre_recurso')
          ->where('idrecurso', $request->input('idrecurso'))
          ->update([
                'idtiporecurso' => $request->input('tiporecurso'),
                'idunidadmedida' => $request->input('unidad'),
                'idfuente' => $request->input('idfuente'),
                'nombrerecurso' => $request->input('nombre'),
                'especificacionestecnicas' => $request->input('especificaciones'),
                'preciorecurso' => $request->input('costo'),
                'cantidadrecurso' => $request->input('cantidad'),
                'subtotalrecurso' => $request->input('costo')*$request->input('cantidad'),
                'idactividad' => $request->input('idactividad')
                


            ]);


                

        session()->flash('success', 'Recurso actualizado exitosamente');
        return redirect()->to('/recursos/show/'.$request->input('idproyecto'));

    }

    public function destroyConfirm($id)
    {

        $recurso = DB::table('pre_recurso')
        ->join('unidad_medida', 'pre_recurso.idunidadmedida', '=', 'unidad_medida.idunidadmedida')
        ->join('tipo_recurso', 'pre_recurso.idtiporecurso', '=', 'tipo_recurso.idtiporecurso')
        ->join('actividad', 'actividad.idactividad', '=', 'pre_recurso.idactividad')
        ->select('pre_recurso.*', 'unidad_medida.nombreunidadmedida', 'tipo_recurso.nombretiporecurso', 'actividad.idproyecto')    
        ->where('pre_recurso.idrecurso', '=', $id)
        ->first();
        

        return view('recursos.delete', compact('recurso'));
    }


    public function destroy($id)
    {

        $recurso = DB::table('pre_recurso')
        ->join('unidad_medida', 'pre_recurso.idunidadmedida', '=', 'unidad_medida.idunidadmedida')
        ->join('tipo_recurso', 'pre_recurso.idtiporecurso', '=', 'tipo_recurso.idtiporecurso')
        ->join('actividad', 'actividad.idactividad', '=', 'pre_recurso.idactividad')
        ->select('pre_recurso.*', 'unidad_medida.nombreunidadmedida', 'tipo_recurso.nombretiporecurso', 'actividad.idproyecto')    
        ->where('pre_recurso.idrecurso', '=', $id)
        ->first();
        
        //dd($codinventario);
         $obj = DB::table('pre_recurso')
        ->where('idrecurso', '=', $id)
        ->delete();



        session()->flash('success', 'Recurso eliminado exitosamente');
        return redirect()->to('/recursos/show/'.$recurso->idproyecto);
    }




}
