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
        ->where('idproyecto', '=', $cod)
        ->get();

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




}
