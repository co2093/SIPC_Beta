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



        return view('fuentes.index', compact('cod'));
    }



    public function show($cod)
    {

        $fuentes = DB::table('pre_fuente')
        ->where('idproyecto', '=', $cod)
        ->get();




        return view('fuentes.show', compact('cod', 'fuentes'));
    }

    public function store(Request $request){

           // dd($request); 
            DB::table('pre_fuente')->insert([
                'descripcionfuente' => $request->input('descripcion'),
                'financiamiento' => $request->input('financiamiento'),
                'esexterno' => $request->input('externo'),
                'idproyecto' => $request->input('cod')
            ]);

            
            $p = DB::table('presupuesto')
            ->where('idproyecto', '=', $request->input('cod'))
            ->first();

            $nuevo = $p->disponible + $request->input('financiamiento');

            DB::table('presupuesto')
            ->where('idproyecto', $request->input('cod'))
            ->update([
                'disponible' => $nuevo 
            ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado la fuente de financiamiento.');

        return redirect()->to('/fuentes/show/'.$request->input('cod'));

    }



     public function edit($cod)
    {
        //dd($codinventario);
        $fuente = DB::table('pre_fuente')
        ->where('idfuente', '=', $cod)
        ->first();

        return view('fuentes.edit', compact('fuente'));
    }


     public function update(Request $request)
    {

        $fuente = DB::table('pre_fuente')
        ->where('idfuente', '=', $request->input('idfuente'))
        ->first();
        
        DB::table('pre_fuente')
        ->where('idfuente', $request->input('idfuente'))
        ->update([
            'descripcionfuente' => $request->input('descripcion'),
            'financiamiento' => $request->input('financiamiento'),
            'esexterno' => $request->input('esexterno')   
        ]);


                

        session()->flash('success', 'Fuente de financiamiento actualizada exitosamente.');
        return redirect()->to('/fuentes/show/'.$fuente->idproyecto);

    }


    public function destroyConfirm($id)
    {

        $fuente = DB::table('pre_fuente')
        ->where('idfuente', '=', $id)
        ->first();
        

        return view('fuentes.delete', compact('fuente'));
    }


    public function destroy($cod)
    {

        $f = DB::table('pre_fuente')
        ->where('idfuente', '=', $cod)
        ->first();
        
        //dd($codinventario);
         $fu = DB::table('pre_fuente')
        ->where('idfuente', '=', $cod)
        ->delete();



        session()->flash('success', 'Fuente eliminada exitosamente');
        return redirect()->to('/fuentes/show/'.$f->idproyecto);
    }    


}

