<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;

class ConvocatoriaController extends Controller
{
    //

    public function index()
    {


        return view('convocatoria.index');


    }



    public function show()
    {
        $convocatorias = DB::table('convocatoria')
        ->where('estado', '=', 1)
        ->get();

        //dd($convocatorias);
        return view('convocatoria.show', compact('convocatorias'));
    }

    public function store(Request $request){

        $time = $request->input('fechainicio');
        $date = new Carbon( $time );  


        DB::table('convocatoria')->insert([

          //  'idconvocatoria' => $request->input('codigo'),
            'fechainicio' => $request->input('fechainicio'),
            'fechafin' => $request->input('fechafin'),
            'presupuesto' => $request->input('presupuesto'),
            'observacion' => $request->input('observacion'),
            'numeroconvocatoria' => $request->input('codigo'),
            'anoconvocatoria' => $date->year,
            'estado' => 1


        ]);

    //flash('Producto agregado al inventario exitosamente', 'success');
    session()->flash('success', 'Se ha iniciado una nueva convocatoria: '.$request->input('codigo'));

    return redirect()->route('convocatoria.show');

    }    
}
