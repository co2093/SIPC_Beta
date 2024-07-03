<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Auth;


class ViaticosController extends Controller
{
    //
    public function index($cod)
    {

        $actividades = DB::table('actividad')
        ->where('idproyecto', '=', $cod)
        ->get();

        $departamentos = DB::table('departamento')
        ->get();

       $fuentes = DB::table('pre_fuente')
        ->where('idproyecto', '=', $cod)
        ->get();


        return view('viaticos.index', compact('cod', 'fuentes', 'departamentos', 'actividades'));
    }



    public function show($cod)
    {
        $viajes = DB::table('pre_viaje_local')
        ->join('actividad', 'actividad.idactividad', '=', 'pre_viaje_local.idactividad')
        ->join('departamento', 'departamento.iddepartamento', '=', 'pre_viaje_local.iddepartamento')
        ->join('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_local.idfuente')
        ->select('pre_viaje_local.*', 'actividad.nombreactividad', 'departamento.departamento')
        ->where('pre_viaje_local.idproyecto', '=', $cod)
        ->get();


        return view('viaticos.show', compact('cod', 'viajes'));
    }
    

    public function store(Request $request){

            //dd($request); 
            DB::table('pre_viaje_local')->insert([
                'idfuente' => $request->input('idfuente'),
                'iddepartamento' => $request->input('iddepartamento'),
                'idproyecto' => $request->input('cod'),
                'kmsarecorrer' => $request->input('distancia'),
                'cantidadvalescombustible' => $request->input('vales'),
                'destinoviaje' => $request->input('destino'),
                'cantidaddias' => $request->input('dias'),
                'cantidadpersonas' => $request->input('personas'),
                'totalplanviaje' => $request->input('total'),
                'horasalida' => $request->input('salida'),
                'horallegada' => $request->input('regreso'),
                'idactividad' => $request->input('actividad')
            ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado el viaje exitosamente.');

        return redirect()->to('/viaticos/show/'.$request->input('cod'));

    }    

    public function edit($cod)
    {
        //dd($codinventario);
        $viaje = DB::table('pre_viaje_local')
        ->join('actividad', 'actividad.idactividad', '=', 'pre_viaje_local.idactividad')
        ->join('departamento', 'departamento.iddepartamento', '=', 'pre_viaje_local.iddepartamento')
        ->join('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_local.idfuente')
        ->select('pre_viaje_local.*', 'actividad.nombreactividad', 'departamento.departamento')
        ->where('pre_viaje_local.idpreviajelocal', '=', $cod)
        ->first();



        $actividades = DB::table('actividad')
        ->where('idproyecto', '=', $viaje->idproyecto)
        ->get();

        $departamentos = DB::table('departamento')
        ->get();

       $fuentes = DB::table('pre_fuente')
        ->where('idproyecto', '=', $viaje->idproyecto)
        ->get();


        return view('viaticos.edit', compact('viaje', 'cod', 'actividades', 'departamentos', 'fuentes'));
    }


     public function update(Request $request)
    {
        $viaje = DB::table('pre_viaje_local')
        ->join('actividad', 'actividad.idactividad', '=', 'pre_viaje_local.idactividad')
        ->join('departamento', 'departamento.iddepartamento', '=', 'pre_viaje_local.iddepartamento')
        ->join('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_local.idfuente')
        ->select('pre_viaje_local.*', 'actividad.nombreactividad', 'departamento.departamento')
        ->where('pre_viaje_local.idpreviajelocal', '=', $request->input('idpreviajelocal'))
        ->first();

 

        
        DB::table('pre_viaje_local')
        ->where('idpreviajelocal', $request->input('idpreviajelocal'))
        ->update([
            
                'idfuente' => $request->input('idfuente'),
                'iddepartamento' => $request->input('iddepartamento'),
                'kmsarecorrer' => $request->input('distancia'),
                'cantidadvalescombustible' => $request->input('vales'),
                'destinoviaje' => $request->input('destino'),
                'cantidaddias' => $request->input('dias'),
                'cantidadpersonas' => $request->input('personas'),
                'totalplanviaje' => $request->input('total'),
                'horasalida' => $request->input('salida'),
                'horallegada' => $request->input('regreso'),
                'idactividad' => $request->input('actividad')
        ]);


                

        session()->flash('success', 'Viaje actualizado exitosamente.');
        return redirect()->to('/viaticos/show/'.$viaje->idproyecto);

    }



    public function destroyConfirm($id)
    {

        $viaje = DB::table('pre_viaje_local')
        ->join('actividad', 'actividad.idactividad', '=', 'pre_viaje_local.idactividad')
        ->join('departamento', 'departamento.iddepartamento', '=', 'pre_viaje_local.iddepartamento')
        ->join('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_local.idfuente')
        ->select('pre_viaje_local.*', 'actividad.nombreactividad', 'departamento.departamento')
        ->where('pre_viaje_local.idpreviajelocal', '=', $id)
        ->first();
        

        return view('viaticos.delete', compact('viaje'));
    }


    public function destroy($cod)
    {

        $viaje = DB::table('pre_viaje_local')
        ->join('actividad', 'actividad.idactividad', '=', 'pre_viaje_local.idactividad')
        ->join('departamento', 'departamento.iddepartamento', '=', 'pre_viaje_local.iddepartamento')
        ->join('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_local.idfuente')
        ->select('pre_viaje_local.*', 'actividad.nombreactividad', 'departamento.departamento')
        ->where('pre_viaje_local.idpreviajelocal', '=', $cod)
        ->first();
        
        
        //dd($codinventario);
         $obj = DB::table('pre_viaje_local')
        ->where('idpreviajelocal', '=', $cod)
        ->delete();



        session()->flash('success', 'Viaje eliminado exitosamente.');
        return redirect()->to('/viaticos/show/'.$viaje->idproyecto);
    }




    public function indexInt()
    {
        return view('viaticos.indexInt');
    }



    public function showInt()
    {
        return view('viaticos.showInt');
    }
}
