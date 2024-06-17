<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Auth;



class ObjetivosController extends Controller
{
    //


   public function index($cod)
    {

        $obj = DB::table('objetivo')
        ->where('idproyecto', '=', $cod)
        ->where('tipo', '=', 1)
        ->first();


        return view('objetivos.index', compact('cod', 'obj'));
    }



    public function show($cod)
    {
      

        $obj = DB::table('objetivo')
        ->where('idproyecto', '=', $cod)
        ->orderby('tipo', 'asc')
        ->get();

        return view('objetivos.show',compact('cod', 'obj'));
    }


    public function store(Request $request){

           // dd($request); 
            DB::table('objetivo')->insert([
                'descripcion' => $request->input('descripcion'),
                'tipo' => $request->input('tipo'),
                'idproyecto' => $request->input('cod')
            ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado el objetivo');

        return redirect()->to('/objetivos/show/'.$request->input('cod'));

    }    


    public function edit($cod)
    {
        //dd($codinventario);
        $obj = DB::table('objetivo')
        ->where('idobjetivo', '=', $cod)
        ->first();

        return view('objetivos.edit', compact('obj'));
    }


     public function update(Request $request)
    {

        $obj = DB::table('objetivo')
        ->where('idobjetivo', '=', $request->input('idobjetivo'))
        ->first();
        
        DB::table('objetivo')
        ->where('idobjetivo', $request->input('idobjetivo'))
        ->update([
            'descripcion' => $request->input('descripcion') 
        ]);


                

        session()->flash('success', 'Objetivo actualizado exitosamente');
        return redirect()->to('/objetivos/show/'.$obj->idproyecto);

    }


    public function destroyConfirm($id)
    {

        $obj = DB::table('objetivo')
        ->where('idobjetivo', '=', $id)
        ->first();
        

        return view('objetivos.confirm', compact('obj'));
    }


    public function destroy($cod)
    {

        $o = DB::table('objetivo')
        ->where('idobjetivo', '=', $cod)
        ->first();
        
        //dd($codinventario);
         $obj = DB::table('objetivo')
        ->where('idobjetivo', '=', $cod)
        ->delete();



        session()->flash('success', 'Objetivo eliminado exitosamente');
        return redirect()->to('/objetivos/show/'.$o->idproyecto);
    }

}
