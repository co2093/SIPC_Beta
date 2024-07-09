<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Auth;


class PresupuestoController extends Controller
{
    //
    public function index()
    {
        return view('presupuesto.index');
    }



    public function show()
    {
        return view('presupuesto.show');
    }


    public function showPresupuesto($cod)
    {
        $p = DB::table('presupuesto')
        ->where('idproyecto', '=', $cod)
        ->first();

        $c = DB::table('convocatoria')
        ->where('estado', '=', 1)
        ->first();

        $pre = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $cod)
        ->first();

        if($pre){



        return view('recursos.presupuesto', compact('cod', 'pre'));

        }else{


        DB::table('presupuesto_inicial')->insert([
            'idproyecto' => $cod,
            'montoconvocatoria' => $c->presupuesto,
            'montodisponible' => $c->presupuesto
        ]);       


        $pre = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $cod)
        ->first();  


        return view('recursos.presupuesto', compact('cod', 'pre'));

        }


    }
}
