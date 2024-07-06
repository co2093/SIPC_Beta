<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Auth;

class PublicacionesController extends Controller
{
    //
    public function index($cod)
    {
        $fuentes = DB::table('pre_fuente')
        ->where('idproyecto', '=', $cod)
        ->get();
        
        $tipos = DB::table('tipo_publicacion')
        ->get();

        return view('publicaciones.index', compact('cod', 'tipos', 'fuentes'));
    }



    public function show($cod)
    {

        //dd($cod);
        $publicaciones = DB::table('pre_publicacion')
        ->join('tipo_publicacion', 'tipo_publicacion.idtipopublicacion', '=', 'pre_publicacion.idtipopublicacion')
        ->join('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_publicacion.idfuente')
        ->select('pre_publicacion.*', 'tipo_publicacion.nombretipopublicacion', 'pre_fuente.descripcionfuente')
        ->where('pre_publicacion.idproyecto', '=', $cod)
        ->get();

        //dd($publicaciones);

        return view('publicaciones.show', compact('cod', 'publicaciones'));
    }


    public function store(Request $request){

            //dd($request); 
            DB::table('pre_publicacion')->insert([
                'idfuente' => $request->input('idfuente'),
                'idproyecto' => $request->input('cod'),
                'idtipopublicacion' => $request->input('idtipo'),
                'detallepublicacion' => $request->input('detalle'),
                'montopublicacion' => $request->input('costo')
            ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado la publicación exitosamente.');

        return redirect()->to('/publicaciones/show/'.$request->input('cod'));

    }    




    public function edit($cod)
    {
        $publicacion = DB::table('pre_publicacion')
        ->join('tipo_publicacion', 'tipo_publicacion.idtipopublicacion', '=', 'pre_publicacion.idtipopublicacion')
        ->join('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_publicacion.idfuente')
        ->select('pre_publicacion.*', 'tipo_publicacion.nombretipopublicacion', 'pre_fuente.descripcionfuente')
        ->where('pre_publicacion.idpublicacion', '=', $cod)
        ->first();


        $fuentes = DB::table('pre_fuente')
        ->where('idproyecto', '=', $cod)
        ->get();
        
        $tipos = DB::table('tipo_publicacion')
        ->get();



        return view('publicaciones.edit', compact('publicacion', 'fuentes', 'tipos'));
    }


     public function update(Request $request)
    {

        //dd($request);

        DB::table('pre_publicacion')
        ->where('idpublicacion', $request->input('idpublicacion'))
        ->update([
            'idfuente' => $request->input('idfuente'),
            'idtipopublicacion' => $request->input('idtipo'),
            'detallepublicacion' => $request->input('detalle'),
            'montopublicacion' => $request->input('costo')
        ]);


                

        session()->flash('success', 'Publicación actualizada exitosamente.');
        return redirect()->to('/publicaciones/show/'.$request->input('cod'));

    }


    public function destroyConfirm($id)
    {

        $publicacion = DB::table('pre_publicacion')
        ->join('tipo_publicacion', 'tipo_publicacion.idtipopublicacion', '=', 'pre_publicacion.idtipopublicacion')
        ->join('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_publicacion.idfuente')
        ->select('pre_publicacion.*', 'tipo_publicacion.nombretipopublicacion', 'pre_fuente.descripcionfuente')
        ->where('pre_publicacion.idpublicacion', '=', $id)
        ->first();
        

        return view('publicaciones.delete', compact('publicacion'));
    }


    public function destroy($id)
    {

        $publicacion = DB::table('pre_publicacion')
        ->where('pre_publicacion.idpublicacion', '=', $id)
        ->first();
        
        //dd($codinventario);
         $pub = DB::table('pre_publicacion')
        ->where('idpublicacion', '=', $id)
        ->delete();



        session()->flash('success', 'Publicación eliminada exitosamente.');
        return redirect()->to('/publicaciones/show/'.$publicacion->idproyecto);
    }



}
