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

        $fuentes = DB::table('pre_fuente')
        ->where('idproyecto', '=', $cod)
        ->where('idrubro', '=', 2)
        ->get();

        $tipo = DB::table('tipo_contratacion')
        ->get();

        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $cod)
        ->first();


        return view('personal.index', compact('cod', 'actividades', 'tipo', 'fuentes', 'p'));
    }



    public function show($cod)
    {


        $personal = DB::table('pre_contratacion')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_contratacion.idactividad')
        ->leftjoin('tipo_contratacion', 'tipo_contratacion.idtipocontratacion', '=', 'pre_contratacion.idtipocontratacion')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_contratacion.idfuente')
        ->select('pre_contratacion.*', 'actividad.nombreactividad', 'actividad.idproyecto', 'tipo_contratacion.nombretipocontratacion', 'pre_fuente.descripcionfuente')
        ->where('actividad.idproyecto', '=', $cod)
        ->get();


        $total = DB::select("select sum(total) from pre_contratacion 
            inner join actividad on pre_contratacion.idactividad = actividad.idactividad
            where actividad.idproyecto = '$cod'");

        return view('personal.show', compact('cod', 'personal', 'total'));
    }



    public function store(Request $request){

            $tipo = DB::table('tipo_contratacion')
            ->where('idtipocontratacion', '=', $request->input('tipo'))
            ->first();

            $p = DB::table('presupuesto_inicial')
            ->where('idproyecto', '=', $request->input('cod'))
            ->first();
            
            $total = $request->input('dias')*$tipo->pagoporhora;


            if($request->input('idfuente')>0)
            {

                $fuente = DB::table('pre_fuente')
                ->where('idfuente', '=', $request->input('idfuente'))
                ->first();

;

                if($fuente->financiamiento >= $total){

                    DB::table('pre_contratacion')->insert([
                    'idtipocontratacion' => $request->input('tipo'),
                    'idactividad' => $request->input('actividad'),
                    'pago' => $tipo->pagoporhora,
                    'dias' => $request->input('dias'),
                    'idfuente' => $request->input('idfuente'),
                    'total' => $request->input('dias')*$tipo->pagoporhora
                    ]);
                    DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible - $total,
                    'montocontratacion' => $p->montocontratacion - $total 
                    ]);
                    DB::table('pre_fuente')
                    ->where('idfuente', $request->input('idfuente'))
                    ->update([
                    'financiamiento' => $fuente->financiamiento - $total 
                    ]);
                }else{

                session()->flash('error', 'No hay fondos suficientes en esta fuente, seleccione otra.');

                return redirect()->back()->with('error', 'No hay fondos suficientes en esta fuente, seleccione otra.');  

                }

            }else{

                if($p->montoconvocatoria>= $total){
                    DB::table('pre_contratacion')->insert([
                    'idtipocontratacion' => $request->input('tipo'),
                    'idactividad' => $request->input('actividad'),
                    'pago' => $tipo->pagoporhora,
                    'dias' => $request->input('dias'),
                    'total' => $request->input('dias')*$tipo->pagoporhora
                    ]);

                    DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible - $total,
                    'montoconvocatoria' => $p->montoconvocatoria - $total 
                    ]);

                }else{

                session()->flash('error', 'No hay fondos suficientes en esta fuente, seleccione otra.');

                return redirect()->to('/personal/show/'.$request->input('cod'));
                }

            }


        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado la contratación.');

        return redirect()->to('/personal/show/'.$request->input('cod'));

    }   





    public function edit($cod)
    {

        $personal = DB::table('pre_contratacion')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_contratacion.idactividad')
        ->leftjoin('tipo_contratacion', 'tipo_contratacion.idtipocontratacion', '=', 'pre_contratacion.idtipocontratacion')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_contratacion.idfuente')
        ->select('pre_contratacion.*', 'actividad.nombreactividad', 'actividad.idproyecto', 'tipo_contratacion.nombretipocontratacion', 'pre_fuente.descripcionfuente')
        ->where('pre_contratacion.idcontratacion', '=', $cod)
        ->first();

        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $personal->idproyecto)
        ->first();

        $fuentes = DB::table('pre_fuente')
        ->where('idproyecto', '=', $personal->idproyecto)
        ->where('idrubro', '=', 2)
        ->get();

        $actividades = DB::table('actividad')
        ->where('idproyecto', '=', $personal->idproyecto)
        ->get();

        $tipo = DB::table('tipo_contratacion')
        ->get();



        return view('personal.edit', compact('personal', 'actividades', 'tipo', 'p', 'fuentes'));
    }


     public function update(Request $request)
    {

        $personal = DB::table('pre_contratacion')
        ->where('pre_contratacion.idcontratacion', '=', $request->input('idcontratacion'))
        ->first();

        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $request->input('cod'))
        ->first();

        $fuente_nueva = DB::table('pre_fuente')
        ->where('idfuente', '=', $request->input('idfuente'))
        ->first();

        $fuente_anterior = DB::table('pre_fuente')
        ->where('idfuente', '=', $request->input('fuenteanterior'))
        ->first();

        $nuevo_total = $request->input('dias')*$request->input('pago');

        $diff = 0;

        if( $personal->total > $nuevo_total)
        {
            $diff = $personal->total + $nuevo_total;   
        }elseif ($personal->total < $nuevo_total) 
        {
            $diff = $personal->total  - $nuevo_total; 
        }




        //Comprobar si hay fuente nueva
        if($fuente_nueva){

            //Verificar que exista una anterior
            if ($fuente_anterior) {
                //Verificar si son las mismas    
                if ($fuente_nueva->idfuente == $fuente_anterior->idfuente) {
                //Si son las mismas


                }else{
                //Es diferente
                    //Comprobar que tenga financiamientos suficientes                
                    if ($fuente_nueva->financiamiento >= $request->input('dias')*$request->input('pago')) {
                        

                    }else{
                        //No hay fondos
                        session()->flash('error', 'No hay fondos suficientes, seleccione otra fuente.');
                        return redirect()->to('/personal/show/'.$request->input('cod'));
                    }

                }
            }

            //No hay fuente anterior





        }else{


            
            if ($fuente_anterior) {
                // code...
            }else{



            }




        }



















 /*       DB::table('pre_contratacion')
        ->where('idcontratacion', $request->input('idcontratacion'))
        ->update([
            'idactividad' => $request->input('actividad'),
            'idtipocontratacion' => $request->input('tipo'),
            'pago' => $request->input('pago'),
            'dias' => $request->input('dias'),
            'total' => $request->input('dias')*$request->input('pago')
        ]);

*/
                

        session()->flash('success', 'Contratación actualizada exitosamente');
        return redirect()->to('/personal/show/'.$request->input('cod'));

    }



    public function destroyConfirm($cod)
    {

        $personal = DB::table('pre_contratacion')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_contratacion.idactividad')
        ->leftjoin('tipo_contratacion', 'tipo_contratacion.idtipocontratacion', '=', 'pre_contratacion.idtipocontratacion')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_contratacion.idfuente')
        ->select('pre_contratacion.*', 'actividad.nombreactividad', 'actividad.idproyecto', 'tipo_contratacion.nombretipocontratacion', 'pre_fuente.descripcionfuente')
        ->where('pre_contratacion.idcontratacion', '=', $cod)
        ->first();


        return view('personal.delete', compact('personal'));
    }


    public function destroy($cod)
    {

        $personal = DB::table('pre_contratacion')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_contratacion.idactividad')
        ->leftjoin('tipo_contratacion', 'tipo_contratacion.idtipocontratacion', '=', 'pre_contratacion.idtipocontratacion')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_contratacion.idfuente')
        ->select('pre_contratacion.*', 'actividad.nombreactividad', 'actividad.idproyecto', 'tipo_contratacion.nombretipocontratacion', 'pre_fuente.idfuente', 'pre_fuente.financiamiento')
        ->where('pre_contratacion.idcontratacion', '=', $cod)
        ->first();


        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $personal->idproyecto)
        ->first();


        if($personal->idfuente){

            $fuente = DB::table('pre_fuente')
            ->where('idfuente', '=', $personal->idfuente)
            ->first();
            

            DB::table('presupuesto_inicial')
            ->where('idproyecto', $personal->idproyecto)
            ->update([
            'montodisponible' => $p->montodisponible  + $personal->total,
            'montocontratacion' => $p->montocontratacion + $personal->total 
            ]);
            DB::table('pre_fuente')
            ->where('idfuente', $fuente->idfuente)
            ->update([
            'financiamiento' => $fuente->financiamiento + $personal->total 
            ]);

        }else{
            DB::table('presupuesto_inicial')
            ->where('idproyecto', $personal->idproyecto)
            ->update([
            'montodisponible' => $p->montodisponible + $personal->total ,
            'montoconvocatoria' => $p->montoconvocatoria + $personal->total  
            ]);

        }

        
        //dd($codinventario);
         $p = DB::table('pre_contratacion')
        ->where('idcontratacion', '=', $cod)
        ->delete();



        session()->flash('success', 'Contratación eliminada exitosamente.');
        return redirect()->to('/personal/show/'.$personal->idproyecto);
    }

    public function end($cod){


        DB::table('pasos_presupuesto')
        ->where('idproyecto', $cod)
        ->update([
            'contrataciones' => 1    

        ]);

        session()->flash('success', 'Contrataciones completadas.');
        return redirect()->to('/presupuesto/show/menu/'.$cod);

    } 

}
