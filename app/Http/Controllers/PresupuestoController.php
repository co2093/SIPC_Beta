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

        if($p){



        return view('recursos.presupuesto', compact('cod', 'p'));

        }else{


        DB::table('presupuesto')->insert([
            'idproyecto' => $cod,
            'presupuestototal' => $c->presupuesto,
            'disponible' => $c->presupuesto
        ]);       


        $p = DB::table('presupuesto')
        ->where('idproyecto', '=', $cod)
        ->first();  


        return view('recursos.presupuesto', compact('cod', 'p'));

        }


    }
}
