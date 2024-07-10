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
        ->where('idrubro', '=', 1)
        ->get();


        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $cod)
        ->first();

 

        //dd($f);

        return view('recursos.index', compact('cod', 'actividades', 'unidades', 'tipo', 'fuentes', 'p'));
    }



    public function show($cod)
    {
        $recursos = DB::table('pre_recurso')
        ->leftjoin('unidad_medida', 'pre_recurso.idunidadmedida', '=', 'unidad_medida.idunidadmedida')
        ->leftjoin('tipo_recurso', 'pre_recurso.idtiporecurso', '=', 'tipo_recurso.idtiporecurso')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_recurso.idfuente')
        ->select('pre_recurso.*', 'unidad_medida.nombreunidadmedida', 'tipo_recurso.nombretiporecurso', 'pre_fuente.descripcionfuente')    
        ->where('pre_recurso.idproyecto', '=', $cod)
        ->get();

    //        dd($recursos);


        return view('recursos.show', compact('cod', 'recursos'));
    }


    public function store(Request $request){

           //dd($request); 

            $fuentes = DB::table('pre_fuente')
            ->where('idproyecto', '=', $request->input('cod'))
            ->where('idrubro', '=', 1)
            ->get();

            $p = DB::table('presupuesto_inicial')
            ->where('idproyecto', '=', $request->input('cod'))
            ->first();
            
            $f = count($fuentes);

            $total = $request->input('costo')*$request->input('cantidad');

            if($request->input('idfuente')>0)
            {

                $fuente = DB::table('pre_fuente')
                ->where('idfuente', '=', $request->input('idfuente'))
                ->first();

                if($fuente->financiamiento >= $total){
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
                    DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible - $total,
                    'montorecursos' => $p->montorecursos - $total 
                    ]);
                    DB::table('pre_fuente')
                    ->where('idfuente', $request->input('idfuente'))
                    ->update([
                    'financiamiento' => $fuente->financiamiento - $total 
                    ]);
                }else{

                session()->flash('success', 'No hay fondos suficientes en esta fuente, seleccione otra.');

                return redirect()->back()->with('danger', 'No hay fondos suficientes en esta fuente, seleccione otra.');  

                }

            }else{

                if($p->montoconvocatoria>= $total){
                    DB::table('pre_recurso')->insert([
                    'idtiporecurso' => $request->input('tiporecurso'),
                    'idunidadmedida' => $request->input('unidad'),
                    'idproyecto' => $request->input('cod'),
                    'nombrerecurso' => $request->input('nombre'),
                    'especificacionestecnicas' => $request->input('especificaciones'),
                    'preciorecurso' => $request->input('costo'),
                    'cantidadrecurso' => $request->input('cantidad'),
                    'subtotalrecurso' => $request->input('costo')*$request->input('cantidad'),
                    'idactividad' => $request->input('idactividad')
                    ]);
                    DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible - $total,
                    'montoconvocatoria' => $p->montoconvocatoria - $total 
                    ]);

                }else{

                session()->flash('success', 'No hay fondos suficientes en esta fuente, seleccione otra.');

                return redirect()->to('/recursos/show/'.$request->input('cod'));
                }

            }


        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado el recurso exitosamente.');

        return redirect()->to('/recursos/show/'.$request->input('cod'));

    }



    public function edit($cod)
    {
        //dd($codinventario);
        $recurso = DB::table('pre_recurso')
        ->leftjoin('unidad_medida', 'pre_recurso.idunidadmedida', '=', 'unidad_medida.idunidadmedida')
        ->leftjoin('tipo_recurso', 'pre_recurso.idtiporecurso', '=', 'tipo_recurso.idtiporecurso')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_recurso.idactividad')
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
        ->leftjoin('unidad_medida', 'pre_recurso.idunidadmedida', '=', 'unidad_medida.idunidadmedida')
        ->leftjoin('tipo_recurso', 'pre_recurso.idtiporecurso', '=', 'tipo_recurso.idtiporecurso')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_recurso.idactividad')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_recurso.idfuente')
        ->select('pre_recurso.*', 'unidad_medida.nombreunidadmedida', 'tipo_recurso.nombretiporecurso', 'pre_fuente.descripcionfuente')   
        ->where('pre_recurso.idrecurso', '=', $id)
        ->first();
        

        return view('recursos.delete', compact('recurso'));
    }


    public function destroy($id)
    {


        $recurso = DB::table('pre_recurso')
        ->leftjoin('unidad_medida', 'pre_recurso.idunidadmedida', '=', 'unidad_medida.idunidadmedida')
        ->leftjoin('tipo_recurso', 'pre_recurso.idtiporecurso', '=', 'tipo_recurso.idtiporecurso')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_recurso.idactividad')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_recurso.idfuente')
        ->select('pre_recurso.*', 'unidad_medida.nombreunidadmedida', 'tipo_recurso.nombretiporecurso', 'pre_fuente.descripcionfuente')   
        ->where('pre_recurso.idrecurso', '=', $id)
        ->first();


        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $recurso->idproyecto)
        ->first();

        if($recurso->idfuente > 0){

            $fuente = DB::table('pre_fuente')
            ->where('idfuente', '=', $recurso->idfuente)
            ->first();
            

            DB::table('presupuesto_inicial')
            ->where('idproyecto', $recurso->idproyecto)
            ->update([
            'montodisponible' => $p->montodisponible + + $recurso->subtotalrecurso,
            'montorecursos' => $p->montorecursos + $recurso->subtotalrecurso 
            ]);
            DB::table('pre_fuente')
            ->where('idfuente', $fuente->idfuente)
            ->update([
            'financiamiento' => $fuente->financiamiento + $recurso->subtotalrecurso 
            ]);

        }else{
            DB::table('presupuesto_inicial')
            ->where('idproyecto', $recurso->idproyecto)
            ->update([
            'montodisponible' => $p->montodisponible + $recurso->subtotalrecurso ,
            'montoconvocatoria' => $p->montoconvocatoria + $recurso->subtotalrecurso  
            ]);

        }
        
        //dd($codinventario);
         $obj = DB::table('pre_recurso')
        ->where('idrecurso', '=', $id)
        ->delete();



        session()->flash('success', 'Recurso eliminado exitosamente');
        return redirect()->to('/recursos/show/'.$recurso->idproyecto);
    }




}
