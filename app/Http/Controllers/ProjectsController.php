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

        $areas = DB::table('area_conocimiento')->get();

        $tipo = DB::table('tipo_proyecto')->get();



        $proyectos = DB::table('proyecto')
        ->where('idproyecto', '=', $cod)
        ->first();

        $tp = DB::table('tipo_proyecto')
        ->where('idtipoproyecto', '=', $proyectos->idtipoproyecto)
        ->first();

        $ar = DB::table('area_conocimiento')
        ->where('idareaconocimiento', '=', $proyectos->idareaconocimiento)
        ->first();

        


        return view('projects.index', compact('areas', 'cod','proyectos', 'tipo', 'tp', 'ar'));
    }

    public function iniciar()
    {
        $areas = DB::table('area_conocimiento')->get();
        $tipo = DB::table('tipo_proyecto')->get();

        return view('projects.iniciar', compact('areas', 'tipo'));
    }



    public function show()
    {

        $convocatorias = DB::table('convocatoria')->get();

       // $estados = DB::table('estado_proyecto')->get();

        $proyectos = DB::table('proyecto')
        ->leftjoin('estado_proyecto', 'estado_proyecto.idestadoproyecto', '=', 'proyecto.idestadoproyecto')
        ->leftjoin('tipo_proyecto', 'tipo_proyecto.idtipoproyecto', '=', 'proyecto.idtipoproyecto')
        ->leftjoin('area_conocimiento', 'area_conocimiento.idareaconocimiento', '=', 'proyecto.idareaconocimiento')
        ->select('proyecto.*', 'estado_proyecto.nombreestadoproyecto', 'tipo_proyecto.tipoproyecto', 'area_conocimiento.nombreareaconocimiento')
        ->where('proyecto.usuario', '=', Auth::user()->email)
        ->paginate(10);

        return view('projects.show', compact('proyectos', 'convocatorias'));
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
            'idtipoproyecto' => $request->input('tipo'),
          //  'codproyecto' => $convocatoria->anoconvocatoria,
            'tituloproyecto' => $request->input('titulo'),
            'antiguo' => false,
            'tiempo' =>$request->input('tiempo'),
            
            'usuario' => $request->input('usuario')


        ]);

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
            'idtipoproyecto' => $request->input('tipo'),
            'tiempo' => $request->input('tiempo')        ]);

        DB::table('pasos_registro')
        ->where('idproyecto', $request->input('idproyecto'))
        ->update([
            'titulo' => 1    

        ]);

                

        session()->flash('success', 'Proyecto actualizado exitosamente.');
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

        $pasos = DB::table('pasos_registro')
        ->where('idproyecto', '=', $cod)
        ->first();

        $proyectos = DB::table('proyecto')
        ->leftjoin('estado_proyecto', 'estado_proyecto.idestadoproyecto', '=', 'proyecto.idestadoproyecto')
        ->leftjoin('tipo_proyecto', 'tipo_proyecto.idtipoproyecto', '=', 'proyecto.idtipoproyecto')
        ->leftjoin('area_conocimiento', 'area_conocimiento.idareaconocimiento', '=', 'proyecto.idareaconocimiento')
        ->select('proyecto.*', 'estado_proyecto.nombreestadoproyecto', 'tipo_proyecto.tipoproyecto', 'area_conocimiento.nombreareaconocimiento')
        ->where('idproyecto', '=', $cod)
        ->first();

        if($pasos) {
            // code...
        }else{

            DB::table('pasos_registro')->insert([
            'idproyecto' => $cod,
            'titulo' => 0,
            'objetivos' => 0,
            'actividades' => 0,
            'presupuesto' => 0,
            'colaboradores' => 0,
            'protocolo' =>0

        ]);

        $pasos = DB::table('pasos_registro')
        ->where('idproyecto', '=', $cod)
        ->first();
        
        }


        $c = DB::table('pasos_registro')
             ->select(DB::raw('sum(titulo+objetivos+actividades+presupuesto+colaboradores+protocolo)'))
             ->where('idproyecto', '=', $cod)
             ->first();
        
        $completado = round(($c->sum*16.666677),0);

      //  dd($completado);


        return view('projects.prueba', compact('proyectos', 'convocatorias', 'estados', 'cod', 'pasos', 'completado'));

    }

    public function protocolo($cod)
    {
        return view('projects.protocolo', compact('cod'));
    }

    public function enviar($cod)
    {
        return view('projects.enviar', compact('cod'));
    }

    public function updateProtocolo(Request $request){

        $attachment = null;
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment')->store('attachments');
        }

        $cod = $request->input('cod');

        DB::table('proyecto')
        ->where('idproyecto', $request->input('cod'))
        ->update([
            'documentodefinicion' => $attachment,
            'idestadoproyecto' => 4      
        ]);

        session()->flash('success', 'Proyecto enviado a revisión exitosamente.');

        return redirect()->to('/projects/show/');

    }




    public function archivadosshow()
    {


        $proyectos = DB::table('proyecto')
        ->leftjoin('estado_proyecto', 'estado_proyecto.idestadoproyecto', '=', 'proyecto.idestadoproyecto')
        ->leftjoin('tipo_proyecto', 'tipo_proyecto.idtipoproyecto', '=', 'proyecto.idtipoproyecto')
        ->leftjoin('area_conocimiento', 'area_conocimiento.idareaconocimiento', '=', 'proyecto.idareaconocimiento')
        ->leftjoin('convocatoria', 'convocatoria.idconvocatoria', '=', 'proyecto.idconvocatoria')
        ->where('proyecto.idestadoproyecto', '!=', 1)
        ->select('proyecto.*', 'estado_proyecto.nombreestadoproyecto', 'tipo_proyecto.tipoproyecto', 'area_conocimiento.nombreareaconocimiento', 'convocatoria.numeroconvocatoria')
        ->paginate(10);


        return view('projects.archivadosshow', compact('proyectos'));
    }

    public function archivadosindex()
    {
        return view('projects.archivadosindex');
    }

    public function archivadosnuevo(){

        $areas = DB::table('area_conocimiento')->get();
        $tipo = DB::table('tipo_proyecto')->get();
        $convocatorias = DB::table('convocatoria')->get();
        $estados = DB::table('estado_proyecto')->get();

        return view('projects.archivados', compact('areas', 'tipo', 'convocatorias', 'estados'));

    }

    public function archivadosstore(Request $request){

        $areas = DB::table('area_conocimiento')->get();
        $tipo = DB::table('tipo_proyecto')->get();
        $convocatorias = DB::table('convocatoria')->get();


        DB::table('proyecto')->insert([
            'idestadoproyecto' => $request->input('idestado'),
            'idareaconocimiento' => $request->input('area'),
            'idconvocatoria' => $request->input('idconvocatoria'),
            'idtipoproyecto' => $request->input('tipo'),
            'tituloproyecto' => $request->input('titulo'),
            'antiguo' => true,
            'tiempo' =>$request->input('tiempo')

        ]);






        session()->flash('success', 'Se ha iniciado un nuevo proyecto.');

        return redirect()->route('archivados.show');
    }

    public function end($cod){


        DB::table('pasos_registro')
        ->where('idproyecto', $cod)
        ->update([
            'protocolo' => 1    

        ]);

        session()->flash('success', 'Protocolo completado.');
        return redirect()->to('/projects/registro/pasos/'.$cod);

    }

}
