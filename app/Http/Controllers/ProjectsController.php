<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Auth;

class ProjectsController extends Controller
{
    //


    public function index($cod)
    {

       //dd($cod);
        $areas = DB::table('area_conocimiento')->get();

        $proyectos = DB::table('proyecto')
        ->where('idproyecto', '=', $cod)
        ->first();

        return view('projects.index', compact('areas', 'cod','proyectos'));
    }

    public function iniciar()
    {
        $areas = DB::table('area_conocimiento')->get();

        return view('projects.iniciar', compact('areas'));
    }



    public function show()
    {

        $convocatorias = DB::table('convocatoria')->get();

        $estados = DB::table('estado_proyecto')->get();

        $proyectos = DB::table('proyecto')
        ->where('usuario', '=', Auth::user()->email)
        ->get();

        return view('projects.show', compact('proyectos', 'convocatorias', 'estados'));
    }


    public function store(Request $request){


       // dd($request);


         $convocatoria = DB::table('convocatoria')
        ->where('estado', '=', 1)
        ->first();

 
        DB::table('proyecto')->insert([
            'idestadoproyecto' => 1,
            'idareaconocimiento' => $request->input('area'),
            'idconvocatoria' => $convocatoria->idconvocatoria,
            'idestadoproyecto' => 1,
          //  'codproyecto' => $convocatoria->anoconvocatoria,
            'tituloproyecto' => $request->input('titulo'),
            'antiguo' => false,
            'tiempo' =>$request->input('tiempo'),
            
            'usuario' => $request->input('usuario')


        ]);

    //flash('Producto agregado al inventario exitosamente', 'success');
    session()->flash('success', 'Se ha iniciado un nuevo proyecto');

    return redirect()->route('projects.show');

    }    


        public function edit($cod)
    {


        $facultades = DB::table('facultad')->get();
        $estados = DB::table('condicion_inventario')->get();

        //dd($codinventario);
         $inv = DB::table('inventario')
        ->where('codinventario', '=', $codinventario)
        ->first();

    
        
        return view('inventario.edit', compact('inv', 'facultades','estados', 'codinventario'));
    }

    public function update(Request $request)
    {

       // dd($request->input('idproyecto'));
        DB::table('proyecto')
        ->where('idproyecto', $request->input('idproyecto'))
        ->update([
            'tituloproyecto' => $request->input('titulo'),
            'idareaconocimiento' => $request->input('area'),
            'tiempo' => $request->input('tiempo')        ]);


                

        session()->flash('success', 'Producto actualizado exitosamente');
        return redirect()->to('/projects/registro/pasos/'.$request->input('idproyecto'));

    }

    public function details($cod)
    {


       // $estados = DB::table('condicion_inventario')->get();

        //dd($codinventario);
         $proyecto = DB::table('proyecto')
        ->where('idproyecto', '=', $cod)
        ->first();

    
        
        return view('projects.details', compact('proyecto'));
    }




    // Remove the specified task from storage
    public function destroyConfirm($cod)
    {

        //dd($codinventario);
         $inv = DB::table('inventario')
        ->where('codinventario', '=', $codinventario)
        ->first();

    
        
        return view('inventario.delete', compact('inv'));
    }


    // Remove the specified task from storage
    public function destroy($cod)
    {
        
        //dd($codinventario);
         $inv = DB::table('inventario')
        ->where('codinventario', '=', $codinventario)
        ->delete();


        session()->flash('success', 'Producto eliminado exitosamente');
        return redirect()->route('inventario.show');
    }



    public function objetivos()
    {
        return view('projects.objetivos');
    }


    public function prueba($cod)
    {

        $convocatorias = DB::table('convocatoria')->get();

        $estados = DB::table('estado_proyecto')->get();

        $proyectos = DB::table('proyecto')
        ->where('idproyecto', '=', $cod)

        ->get();

        return view('projects.prueba', compact('proyectos', 'convocatorias', 'estados', 'cod'));

    }

    public function protocolo()
    {
        return view('projects.protocolo');
    }

    public function enviar()
    {
        return view('projects.enviar');
    }




    public function archivadosshow()
    {
        return view('projects.archivadosshow');
    }

    public function archivadosindex()
    {
        return view('projects.archivadosindex');
    }

}
