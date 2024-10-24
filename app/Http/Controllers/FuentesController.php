<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Auth;


class FuentesController extends Controller
{
    //

    public function index($cod)
    {

        $rubros = DB::table('pre_rubro')
        ->get();

        return view('fuentes.index', compact('cod', 'rubros'));
    }



    public function show($cod)
    {

        $fuentes = DB::table('pre_fuente')
        ->leftjoin('pre_rubro', 'pre_rubro.idrubro', '=', 'pre_fuente.idrubro')
        ->select('pre_fuente.*', 'pre_rubro.rubro')
        ->where('idproyecto', '=', $cod)
        ->get();




        return view('fuentes.show', compact('cod', 'fuentes'));
    }

    public function store(Request $request){


            $p = DB::table('presupuesto_inicial')
            ->where('idproyecto', '=', $request->input('cod'))
            ->first();
            $disponiblenuevo = $p->montodisponible + $request->input('financiamiento');

            //dd($disponiblenuevo); 


            DB::table('pre_fuente')->insert([
                'descripcionfuente' => $request->input('descripcion'),
                'financiamiento' => $request->input('financiamiento'),
                'esexterno' => $request->input('externo'),
                'idproyecto' => $request->input('cod'),
                'idrubro' =>$request->input('rubro')
            ]);


            DB::table('presupuesto_inicial')
            ->where('idproyecto', $request->input('cod'))
            ->update([
                'montodisponible' => $disponiblenuevo 
            ]);



            if($request->input('rubro') == 1)
            {
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $request->input('cod'))
                ->update([
                    'montorecursos' => $p->montorecursos + $request->input('financiamiento') 
                ]);
            }elseif ($request->input('rubro') == 2) {
                // code...
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $request->input('cod'))
                ->update([
                    'montocontratacion' => $p->montocontratacion + $request->input('financiamiento')  
                ]);
            }elseif ($request->input('rubro') == 3) {
                // code...
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $request->input('cod'))
                ->update([
                    'montonacionales' => $p->montonacionales + $request->input('financiamiento')  
                ]);
            }elseif ($request->input('rubro') == 4) {
                // code...
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $request->input('cod'))
                ->update([
                    'montointernacionales' => $p->montointernacionales + $request->input('financiamiento') 
                ]);
            }elseif ($request->input('rubro') == 5) {
                // code...
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $request->input('cod'))
                ->update([
                    'montopublicaciones' => $p->montopublicaciones + $request->input('financiamiento') 
                ]);
            }


        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado la fuente de financiamiento.');

        return redirect()->to('/fuentes/show/'.$request->input('cod'));

    }



     public function edit($cod)
    {
        //dd($codinventario);
        $fuente = DB::table('pre_fuente')
        ->leftjoin('pre_rubro', 'pre_rubro.idrubro', '=', 'pre_fuente.idrubro')
        ->select('pre_fuente.*', 'pre_rubro.rubro', 'pre_rubro.idrubro')
        ->where('idfuente', '=', $cod)
        ->first();
        
        $rubros = DB::table('pre_rubro')
        ->orderby('rubro')
        ->get();

        return view('fuentes.edit', compact('fuente', 'rubros'));
    }


     public function update(Request $request)
    {

        //dd($request);

        $fuente = DB::table('pre_fuente')
        ->where('idfuente', '=', $request->input('idfuente'))
        ->first();

        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $fuente->idproyecto)
        ->first();


        $diff = 0;


        if($request->input('anterior') > $request->input('financiamiento'))
        {
            $diff = $request->input('anterior') + $request->input('financiamiento');   
        }elseif ($request->input('anterior') < $request->input('financiamiento')) 
        {
            $diff = $request->input('anterior')  - $request->input('financiamiento'); 
        }

       
        
        DB::table('pre_fuente')
        ->where('idfuente', $request->input('idfuente'))
        ->update([
            'descripcionfuente' => $request->input('descripcion'),
            'financiamiento' => $request->input('financiamiento'),
            'esexterno' => $request->input('esexterno'),
            'idrubro' =>$request->input('rubro')   
        ]);

        DB::table('presupuesto_inicial')
            ->where('idproyecto', $p->idproyecto)
            ->update([
            'montodisponible' => $p->montodisponible - $diff
        ]);

        if($fuente->idrubro == 1)
            {
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $p->idproyecto)
                ->update([
                    'montorecursos' => $p->montorecursos - $diff 
                ]);
            }elseif ($fuente->idrubro == 2) {
                // code...
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $p->idproyecto)
                ->update([
                    'montocontratacion' => $p->montocontratacion - $diff   
                ]);
            }elseif ($fuente->idrubro == 3) {
                // code...
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $p->idproyecto)
                ->update([
                    'montonacionales' => $p->montonacionales - $diff 
                ]);
            }elseif ($fuente->idrubro == 4) {
                // code...
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $p->idproyecto)
                ->update([
                    'montointernacionales' => $p->montointernacionales - $diff   
                ]);
            }elseif ($fuente->idrubro == 5) {
                // code...
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $p->idproyecto)
                ->update([
                    'montopublicaciones' => $p->montopublicaciones - $diff  
                ]);
            }  

                

        session()->flash('success', 'Fuente de financiamiento actualizada exitosamente.');
        return redirect()->to('/fuentes/show/'.$fuente->idproyecto);

    }


    public function destroyConfirm($id)
    {

        $fuente = DB::table('pre_fuente')
        ->leftjoin('pre_rubro', 'pre_rubro.idrubro', '=', 'pre_fuente.idrubro')
        ->select('pre_fuente.*', 'pre_rubro.rubro')
        ->where('idfuente', '=', $id)
        ->first();
        

        return view('fuentes.delete', compact('fuente'));
    }


    public function destroy($cod)
    {

        $f = DB::table('pre_fuente')
        ->where('idfuente', '=', $cod)
        ->first();

        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $f->idproyecto)
        ->first();

        DB::table('presupuesto_inicial')
           ->where('idproyecto', $f->idproyecto)
           ->update([
            'montodisponible' => $p->montodisponible - $f->financiamiento 
        ]);


        if($f->idrubro == 1)
            {
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $f->idproyecto)
                ->update([
                    'montorecursos' => $p->montorecursos - $f->financiamiento 
                ]);
            }elseif ($f->idrubro == 2) {
                // code...
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $f->idproyecto)
                ->update([
                    'montocontratacion' => $p->montocontratacion - $f->financiamiento   
                ]);
            }elseif ($f->idrubro == 3) {
                // code...
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $f->idproyecto)
                ->update([
                    'montonacionales' => $p->montonacionales - $f->financiamiento 
                ]);
            }elseif ($f->idrubro == 4) {
                // code...
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $f->idproyecto)
                ->update([
                    'montointernacionales' => $p->montointernacionales - $f->financiamiento  
                ]);
            }elseif ($f->idrubro == 5) {
                // code...
                DB::table('presupuesto_inicial')
                ->where('idproyecto', $f->idproyecto)
                ->update([
                    'montopublicaciones' => $p->montopublicaciones - $f->financiamiento 
                ]);
            }           
            
        
        $fu = DB::table('pre_fuente')
        ->where('idfuente', '=', $cod)
        ->delete();



        session()->flash('success', 'Fuente eliminada exitosamente');
        return redirect()->to('/fuentes/show/'.$f->idproyecto);
    }    


    public function end($cod){


        DB::table('pasos_presupuesto')
        ->where('idproyecto', $cod)
        ->update([
            'fuentes' => 1    

        ]);

        session()->flash('success', 'Financiamientos completados.');
        return redirect()->to('/presupuesto/show/menu/'.$cod);

    }


}

