<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;

class InventarioController extends Controller
{
    //
    public function index()
    {
        $facultades = DB::table('facultad')->get();
        $estados = DB::table('condicion_inventario')->get();

        return view('inventario.index', compact('facultades', 'estados'));
    }



    public function show()
    {

        $inventario = DB::table('inventario')->get();

        return view('inventario.show', compact('inventario'));
    }



    //Store

    public function store(Request $request){

        //dd($request);

        DB::table('inventario')->insert([

            'codinventario' => $request->input('serie'),
            'idcondicioninventario' => $request->input('estado'),
            'cantidad' => $request->input('cantidad'),
            'descripcionbien' => $request->input('nombre'),
            'ubicacion' => $request->input('ubicacion'),
            'especificacion' => $request->input('especificaciones'),
            'serie' => $request->input('serie'),
            'valor' => $request->input('costo'),
            'facultad' => $request->input('facultad')

        ]);


        /**
=> $request->input(''),

        DB::table('plan_compras')->insert([
            'cantidad' => $request->input('cantidad'),
            'nombre_producto' => $request->input('nombre_producto'),
            'especificaciones' => $request->input('especificaciones'),
            'precio_unitario' => $p,
            'cotizacion' => $nombreOriginal,
            'proveedor'=>$request->input('proveedor'),
            'user_id' => $request->input('user_id'),
            'categoria' => $request->input('categoria'),
            'fecha' => $fecha,
            'estado' => 'Pendiente' 
        ]);



        **/



    //flash('Producto agregado al inventario exitosamente', 'success');
    session()->flash('success', 'Se ha ingresado al inventario: '.$request->input('nombre'));

    return redirect()->route('inventario.show');

    }    


    public function edit($codinventario)
    {


        $facultades = DB::table('facultad')->get();
        $estados = DB::table('condicion_inventario')->get();

        //dd($codinventario);
         $inv = DB::table('inventario')
        ->where('codinventario', '=', $codinventario)
        ->first();

    
        
        return view('inventario.edit', compact('inv', 'facultades','estados'));
    }

    public function update(Request $request)
    {
        DB::table('inventario')
        ->where('codinventario', $request->input('codinventario'))
        ->update([
            'codinventario' => $request->input('serie'),
            'idcondicioninventario' => $request->input('estado'),
            'cantidad' => $request->input('cantidad'),
            'descripcionbien' => $request->input('nombre'),
            'ubicacion' => $request->input('ubicacion'),
            'especificacion' => $request->input('especificaciones'),
            'serie' => $request->input('serie'),
            'valor' => $request->input('costo'),
            'facultad' => $request->input('facultad')            
        ]);


                

        session()->flash('success', 'Producto actualizado exitosamente');
        return redirect()->route('inventario.show');

    }

    public function details($codinventario)
    {


        $estados = DB::table('condicion_inventario')->get();

        //dd($codinventario);
         $inv = DB::table('inventario')
        ->where('codinventario', '=', $codinventario)
        ->first();

    
        
        return view('inventario.details', compact('inv','estados'));
    }




    // Remove the specified task from storage
    public function destroyConfirm($codinventario)
    {

        //dd($codinventario);
         $inv = DB::table('inventario')
        ->where('codinventario', '=', $codinventario)
        ->first();

    
        
        return view('inventario.delete', compact('inv'));
    }


    // Remove the specified task from storage
    public function destroy($codinventario)
    {
        
        //dd($codinventario);
         $inv = DB::table('inventario')
        ->where('codinventario', '=', $codinventario)
        ->delete();


        session()->flash('success', 'Producto eliminado exitosamente');
        return redirect()->route('inventario.show');
    }
}
