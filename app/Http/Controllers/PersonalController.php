<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Auth;

class PersonalController extends Controller
{
    //
    public function index($cod)
    {   
        $actividades = DB::table('actividad')
        ->where('idproyecto', '=', $cod)
        ->get();

        $tipo = DB::table('tipo_contratacion')
        ->get();

        return view('personal.index', compact('cod', 'actividades', 'tipo'));
    }



    public function show($cod)
    {


        $personal = DB::table('pre_contratacion')
        ->join('actividad', 'actividad.idactividad', '=', 'pre_contratacion.idactividad')
        ->join('tipo_contratacion', 'tipo_contratacion.idtipocontratacion', '=', 'pre_contratacion.idtipocontratacion')
        ->select('pre_contratacion.*', 'actividad.nombreactividad', 'actividad.idproyecto', 'tipo_contratacion.nombretipocontratacion')
        ->where('actividad.idproyecto', '=', $cod)
        ->get();



        return view('personal.show', compact('cod', 'personal'));
    }



    public function store(Request $request){

            DB::table('pre_contratacion')->insert([
                'idtipocontratacion' => $request->input('tipo'),
                'idactividad' => $request->input('actividad'),
                'pago' => $request->input('pago'),
                'dias' => $request->input('dias'),
                'total' => $request->input('dias')*$request->input('pago')

            ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado la contratación.');

        return redirect()->to('/personal/show/'.$request->input('cod'));

    }   





    public function edit($cod)
    {
        $personal = DB::table('pre_contratacion')
        ->join('actividad', 'actividad.idactividad', '=', 'pre_contratacion.idactividad')
        ->join('tipo_contratacion', 'tipo_contratacion.idtipocontratacion', '=', 'pre_contratacion.idtipocontratacion')
        ->select('pre_contratacion.*', 'actividad.nombreactividad', 'actividad.idproyecto', 'tipo_contratacion.nombretipocontratacion')
        ->where('pre_contratacion.idcontratacion', '=', $cod)
        ->first();


        $actividades = DB::table('actividad')
        ->where('idproyecto', '=', $personal->idproyecto)
        ->get();

        $tipo = DB::table('tipo_contratacion')
        ->get();



        return view('personal.edit', compact('personal', 'actividades', 'tipo'));
    }


     public function update(Request $request)
    {


        DB::table('pre_contratacion')
        ->where('idcontratacion', $request->input('idcontratacion'))
        ->update([
            'idactividad' => $request->input('actividad'),
            'idtipocontratacion' => $request->input('tipo'),
            'pago' => $request->input('pago'),
            'dias' => $request->input('dias'),
            'total' => $request->input('dias')*$request->input('pago')
        ]);


                

        session()->flash('success', 'contratación actualizada exitosamente');
        return redirect()->to('/personal/show/'.$request->input('cod'));

    }



    public function destroyConfirm($cod)
    {

        $personal = DB::table('pre_contratacion')
        ->join('actividad', 'actividad.idactividad', '=', 'pre_contratacion.idactividad')
        ->join('tipo_contratacion', 'tipo_contratacion.idtipocontratacion', '=', 'pre_contratacion.idtipocontratacion')
        ->select('pre_contratacion.*', 'actividad.nombreactividad', 'actividad.idproyecto', 'tipo_contratacion.nombretipocontratacion')
        ->where('pre_contratacion.idcontratacion', '=', $cod)
        ->first();


        return view('personal.delete', compact('personal'));
    }


    public function destroy($cod)
    {

        $personal = DB::table('pre_contratacion')
        ->join('actividad', 'actividad.idactividad', '=', 'pre_contratacion.idactividad')
        ->join('tipo_contratacion', 'tipo_contratacion.idtipocontratacion', '=', 'pre_contratacion.idtipocontratacion')
        ->select('pre_contratacion.*', 'actividad.nombreactividad', 'actividad.idproyecto', 'tipo_contratacion.nombretipocontratacion')
        ->where('pre_contratacion.idcontratacion', '=', $cod)
        ->first();

        
        //dd($codinventario);
         $p = DB::table('pre_contratacion')
        ->where('idcontratacion', '=', $cod)
        ->delete();



        session()->flash('success', 'contratación eliminada exitosamente.');
        return redirect()->to('/personal/show/'.$personal->idproyecto);
    }
 

}
