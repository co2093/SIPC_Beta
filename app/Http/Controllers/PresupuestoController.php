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

        $c1 = DB::table('convocatoria')
        ->where('estado', '=', 1)
        ->first();

        $pre = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $cod)
        ->first();

        $pasos = DB::table('pasos_presupuesto')
        ->where('idproyecto', '=', $cod)
        ->first();

        if($pasos) {
            // code...
        }else{

            DB::table('pasos_presupuesto')->insert([
            'idproyecto' => $cod,
            'fuentes' => 0,
            'recursos' => 0,
            'contrataciones' => 0,
            'nacionales' => 0,
            'internacionales' => 0,
            'pulicaciones' =>0

        ]);

        $pasos = DB::table('pasos_presupuesto')
        ->where('idproyecto', '=', $cod)
        ->first();
        
        }


        $c = DB::table('pasos_presupuesto')
             ->select(DB::raw('sum(fuentes+recursos+contrataciones+nacionales+internacionales+pulicaciones)'))
             ->where('idproyecto', '=', $cod)
             ->first();
        

        $completado = round(($c->sum*16.666677),0);

        if($completado == 100){

        DB::table('pasos_registro')
        ->where('idproyecto', $cod)
        ->update([
            'presupuesto' => 1    

        ]);


        }



        if($pre){



        return view('recursos.presupuesto', compact('cod', 'pre', 'completado', 'pasos'));

        }else{


        DB::table('presupuesto_inicial')->insert([
            'idproyecto' => $cod,
            'montoconvocatoria' => $c1->presupuesto,
            'montodisponible' => $c1->presupuesto
        ]);       


        $pre = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $cod)
        ->first();  


        return view('recursos.presupuesto', compact('cod', 'pre', 'completado', 'pasos'));

        }


    }
}
