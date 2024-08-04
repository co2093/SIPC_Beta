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

        $total = DB::select("select sum(subtotalrecurso) from pre_recurso where idproyecto = '$cod'");


        return view('recursos.show', compact('cod', 'recursos', 'total'));
    }


    public function store(Request $request){

           //dd($request); 

 
            $p = DB::table('presupuesto_inicial')
            ->where('idproyecto', '=', $request->input('cod'))
            ->first();
         

            $total = $request->input('montofuente') + $request->input('montoconvocatoria');


            if($request->input('idfuente'))
            {

                $fuente = DB::table('pre_fuente')
                ->where('idfuente', '=', $request->input('idfuente'))
                ->first();

                if($fuente->financiamiento >= $request->input('montofuente') 
                    && $p->montoconvocatoria>= $request->input('montoconvocatoria') ){


                    DB::table('pre_recurso')->insert([
                    'idtiporecurso' => $request->input('tiporecurso'),
                    'idunidadmedida' => $request->input('unidad'),
                    'idfuente' => $request->input('idfuente'),
                    'idproyecto' => $request->input('cod'),
                    'nombrerecurso' => $request->input('nombre'),
                    'especificacionestecnicas' => $request->input('especificaciones'),
                    'preciorecurso' => $total/$request->input('cantidad'),
                    'cantidadrecurso' => $request->input('cantidad'),
                    'subtotalrecurso' => $total,
                    'idactividad' => $request->input('idactividad'),
                    'montoconvocatoria' => $request->input('montoconvocatoria'),
                    'montofuente' => $request->input('montofuente')
                    ]);
                   
                    DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible - $total,
                    'montorecursos' => $p->montorecursos - $request->input('montofuente'),
                    'montoconvocatoria' => $p->montoconvocatoria - $request->input('montoconvocatoria') 

                    ]);
                    DB::table('pre_fuente')
                    ->where('idfuente', $request->input('idfuente'))
                    ->update([
                    'financiamiento' => $fuente->financiamiento - $request->input('montofuente')
                    ]);
                }else{

                session()->flash('error', 'No hay fondos suficientes en esta fuente, seleccione otra.');

                return redirect()->back()->with('error', 'No hay fondos suficientes en esta fuente, seleccione otra.');  

                }

            }else{

                if($p->montoconvocatoria>= $request->input('montoconvocatoria')){


                    DB::table('pre_recurso')->insert([
                    'idtiporecurso' => $request->input('tiporecurso'),
                    'idunidadmedida' => $request->input('unidad'),
                    'idproyecto' => $request->input('cod'),
                    'nombrerecurso' => $request->input('nombre'),
                    'especificacionestecnicas' => $request->input('especificaciones'),
                    'preciorecurso' => $total/$request->input('cantidad'),
                    'cantidadrecurso' => $request->input('cantidad'),
                    'subtotalrecurso' => $total,
                    'montoconvocatoria' => $request->input('montoconvocatoria'),
                    'idactividad' => $request->input('idactividad')
                    ]);

                    DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible - $total,
                    'montoconvocatoria' => $p->montoconvocatoria - $request->input('montoconvocatoria') 
                    ]);

                }else{

                session()->flash('error', 'No hay fondos suficientes en esta fuente, seleccione otra.');

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
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_recurso.idfuente')
        ->select('pre_recurso.*', 'unidad_medida.nombreunidadmedida', 'tipo_recurso.nombretiporecurso', 
            'actividad.idproyecto', 'pre_fuente.descripcionfuente', 'pre_fuente.financiamiento')    
        ->where('pre_recurso.idrecurso', '=', $cod)
        ->first();

        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $recurso->idproyecto)
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
        ->where('idrubro', '=', 1)
        ->get();

      //  dd($recurso);


        return view('recursos.edit', compact('recurso', 'actividades', 'unidades', 'tipo', 'fuentes', 'p'));
    }    


    public function update(Request $request)
    {

        $recurso = DB::table('pre_recurso')
        ->where('pre_recurso.idrecurso', '=', $request->input('idrecurso'))
        ->first();

        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $recurso->idproyecto)
        ->first();

        $fuente_nueva = DB::table('pre_fuente')
        ->where('idfuente', '=', $request->input('idfuente'))
        ->first();

        $fuente_anterior = DB::table('pre_fuente')
        ->where('idfuente', '=', $request->input('fuenteanterior'))
        ->first();

        $nuevo_total = $request->input('montofuente') + $request->input('montoconvocatoria');
        
        $diffFuente = 0;
        $diffConv = 0;
        
        if($request->input('montofuente') >= $recurso->montofuente )
        {
            $diffFuente = $recurso->montofuente - $request->input('montofuente');   
        }elseif ($recurso->montofuente > $request->input('montofuente')) 
        {
            $diff = $recurso->montofuente  - $request->input('montofuente'); 
        }


      

        if ($request->input('idfuente')) {

            if($fuente_nueva->financiamiento >= $request->input('montofuente') 
                && $p->montoconvocatoria>= $request->input('montoconvocatoria')){

                    DB::table('presupuesto_inicial')
                    ->where('idproyecto', $recurso->idproyecto)
                    ->update([
                        'montodisponible' => $p->montodisponible - $diff,
                        'montorecursos' => $p->montorecursos - $diff
                    ]);


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
           

                    if($request->input('idfuente') == $fuente_anterior->idfuente){


                        DB::table('pre_fuente')
                            ->where('idfuente', $request->input('idfuente'))
                            ->update([
                            'financiamiento' => $fuente_nueva->financiamiento - $diff 
                        ]);         
               
                     
                    }else{

                        DB::table('pre_fuente')
                            ->where('idfuente', $request->input('idfuente'))
                            ->update([
                            'financiamiento' => $fuente_nueva->financiamiento - $diff 
                        ]);

                        DB::table('pre_fuente')
                            ->where('idfuente', $request->input('idfuente'))
                            ->update([
                            'financiamiento' => $fuente_anterior->financiamiento + $recurso->subtotalrecurso
                        ]);    


                    }





            }else{

                session()->flash('error', 'No hay fondos suficientes, seleccione otra fuente.');
                return redirect()->to('/recursos/show/'.$request->input('idproyecto'));
            }

        }else{
   
           if($p->montoconvocatoria >= $nuevo_total){
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $recurso->idproyecto)
                ->update([
                    'montodisponible' => $p->montodisponible - $diff,
                    'montoconvocatoria' => $p->montoconvocatoria - $diff
                ]);

                DB::table('pre_recurso')
                ->where('idrecurso', $request->input('idrecurso'))
                ->update([
                        'idtiporecurso' => $request->input('tiporecurso'),
                        'idunidadmedida' => $request->input('unidad'),
                        'idfuente' => null,
                        'nombrerecurso' => $request->input('nombre'),
                        'especificacionestecnicas' => $request->input('especificaciones'),
                        'preciorecurso' => $request->input('costo'),
                        'cantidadrecurso' => $request->input('cantidad'),
                        'subtotalrecurso' => $request->input('costo')*$request->input('cantidad'),
                        'idactividad' => $request->input('idactividad')    
                ]);     
           
               
                if($fuente_anterior>0){

                    DB::table('pre_fuente')
                    ->where('idfuente', $request->input('idfuente'))
                    ->update([
                        'financiamiento' => $fuente_anterior->financiamiento + $recurso->subtotalrecurso
                    ]);    
                }
            }else{
                session()->flash('error', 'No hay fondos suficientes, seleccione otra fuente.');
                return redirect()->to('/recursos/show/'.$request->input('idproyecto'));

           }

        }


       
 

                

        session()->flash('success', 'Recurso actualizado exitosamente.');
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

        if($recurso->idfuente){

            $fuente = DB::table('pre_fuente')
            ->where('idfuente', '=', $recurso->idfuente)
            ->first();
            

            DB::table('presupuesto_inicial')
            ->where('idproyecto', $recurso->idproyecto)
            ->update([
            'montodisponible' => $p->montodisponible  + $recurso->subtotalrecurso,
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



        session()->flash('success', 'Recurso eliminado exitosamente.');
        return redirect()->to('/recursos/show/'.$recurso->idproyecto);
    }

    public function end($cod){


        DB::table('pasos_presupuesto')
        ->where('idproyecto', $cod)
        ->update([
            'recursos' => 1    

        ]);

        session()->flash('success', 'Recursos completados.');
        return redirect()->to('/presupuesto/show/menu/'.$cod);

    }




}
