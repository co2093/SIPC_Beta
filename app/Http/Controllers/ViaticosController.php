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
        ->orderby('nombreactividad')
        ->get();

        $departamentos = DB::table('departamento')
        ->orderby('departamento')
        ->get();

       $fuentes = DB::table('pre_fuente')
        ->where('idproyecto', '=', $cod)
        ->get();
        
        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $cod)
        ->first();




        return view('viaticos.index', compact('cod', 'fuentes', 'departamentos', 'actividades', 'p'));
    }



    public function show($cod)
    {
        $viajes = DB::table('pre_viaje_local')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_viaje_local.idactividad')
        ->leftjoin('departamento', 'departamento.iddepartamento', '=', 'pre_viaje_local.iddepartamento')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_local.idfuente')
        ->select('pre_viaje_local.*', 'actividad.nombreactividad', 'departamento.departamento', 'pre_fuente.descripcionfuente')
        ->where('pre_viaje_local.idproyecto', '=', $cod)
        ->get();

        return view('viaticos.show', compact('cod', 'viajes'));
    }
    

    public function store(Request $request){

        $fuente = DB::table('pre_fuente')
        ->where('idfuente', '=', $request->input('idfuente'))
        ->first();

        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $request->input('cod'))
        ->first();

        $total = $request->input('costodiario')*$request->input('dias')*$request->input('personas') + $request->input('vales')*10;

        if ($fuente) {
            // code...
            DB::table('pre_viaje_local')->insert([
                'idfuente' => $request->input('idfuente'),
                'iddepartamento' => $request->input('iddepartamento'),
                'idproyecto' => $request->input('cod'),
                'kmsarecorrer' => $request->input('distancia'),
                'cantidadvalescombustible' => $request->input('vales'),
                'destinoviaje' => $request->input('destino'),
                'cantidaddias' => $request->input('dias'),
                'cantidadpersonas' => $request->input('personas'),
                'totalplanviaje' => $total,
                'horasalida' => $request->input('salida'),
                'horallegada' => $request->input('regreso'),
                'idactividad' => $request->input('actividad'),
                'montofuente' => $request->input('montofuente'),
                'montoconvocatoria' => $request->input('montoconvocatoria')
            ]);
            DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible - $total,
                    'montonacionales' => $p->montonacionales - $request->input('montofuente'),
                    'montoconvocatoria' => $p->montoconvocatoria - $request->input('montoconvocatoria') 

            ]);
            DB::table('pre_fuente')
                ->where('idfuente', $request->input('idfuente'))
                ->update([
                'financiamiento' => $fuente->financiamiento - $request->input('montofuente')
            ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado el viaje exitosamente.');
        return redirect()->to('/viaticos/show/'.$request->input('cod'));

        } else {
            // code...
            DB::table('pre_viaje_local')->insert([
                'iddepartamento' => $request->input('iddepartamento'),
                'idproyecto' => $request->input('cod'),
                'kmsarecorrer' => $request->input('distancia'),
                'cantidadvalescombustible' => $request->input('vales'),
                'destinoviaje' => $request->input('destino'),
                'cantidaddias' => $request->input('dias'),
                'cantidadpersonas' => $request->input('personas'),
                'totalplanviaje' => $total,
                'horasalida' => $request->input('salida'),
                'horallegada' => $request->input('regreso'),
                'idactividad' => $request->input('actividad'),
                'montoconvocatoria' => $request->input('montoconvocatoria')
            ]);
            DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible - $total,
                    'montoconvocatoria' => $p->montoconvocatoria - $request->input('montoconvocatoria') 

            ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado el viaje exitosamente.');

        return redirect()->to('/viaticos/show/'.$request->input('cod'));
        }



    }    

    public function edit($cod)
    {
        //dd($codinventario);
        $viaje = DB::table('pre_viaje_local')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_viaje_local.idactividad')
        ->leftjoin('departamento', 'departamento.iddepartamento', '=', 'pre_viaje_local.iddepartamento')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_local.idfuente')
        ->select('pre_viaje_local.*', 'actividad.nombreactividad', 'departamento.departamento','departamento.iddepartamento', 'actividad.idactividad', 'pre_fuente.idfuente', 'pre_fuente.descripcionfuente')
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

        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $viaje->idproyecto)
        ->first();


        return view('viaticos.edit', compact('viaje', 'cod', 'actividades', 'departamentos', 'fuentes', 'p'));
    }


     public function update(Request $request)
    {
        $viaje = DB::table('pre_viaje_local')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_viaje_local.idactividad')
        ->leftjoin('departamento', 'departamento.iddepartamento', '=', 'pre_viaje_local.iddepartamento')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_local.idfuente')
        ->select('pre_viaje_local.*', 'actividad.nombreactividad', 'departamento.departamento')
        ->where('pre_viaje_local.idpreviajelocal', '=', $request->input('idpreviajelocal'))
        ->first();
        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $viaje->idproyecto)
        ->first();
        $fuente = DB::table('pre_fuente')
        ->where('idfuente', '=', $viaje->idfuente)
        ->first();
         $total = $request->input('costodiario')*$request->input('dias')*$request->input('personas') + $request->input('vales')*10;


        if ($fuente) {
            // code...
            DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible + $viaje->totalplanviaje - $total,
                    'montonacionales' => $p->montonacionales + $viaje->montofuente - $request->input('montofuente'),
                    'montoconvocatoria' => $p->montoconvocatoria + $viaje->montoconvocatoria - $request->input('montoconvocatoria')

        ]);

        DB::table('pre_fuente')
            ->where('idfuente', $request->input('idfuente'))
            ->update([
            'financiamiento' => $fuente->financiamiento + $viaje->montofuente - $request->input('montofuente')
        ]);

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
                'totalplanviaje' => $total,
                'horasalida' => $request->input('salida'),
                'horallegada' => $request->input('regreso'),
                'idactividad' => $request->input('actividad'),
                'montofuente' => $request->input('montofuente'),
                'montoconvocatoria' => $request->input('montoconvocatoria')        
        ]);

        session()->flash('success', 'Viaje actualizado exitosamente.');
        return redirect()->to('/viaticos/show/'.$viaje->idproyecto);


        } else {
            // code...
        DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible + $viaje->totalplanviaje - $total,
                    'montoconvocatoria' => $p->montoconvocatoria + $viaje->montoconvocatoria - $request->input('montoconvocatoria')

        ]);

        DB::table('pre_viaje_local')
        ->where('idpreviajelocal', $request->input('idpreviajelocal'))
        ->update([
            
                'iddepartamento' => $request->input('iddepartamento'),
                'kmsarecorrer' => $request->input('distancia'),
                'cantidadvalescombustible' => $request->input('vales'),
                'destinoviaje' => $request->input('destino'),
                'cantidaddias' => $request->input('dias'),
                'cantidadpersonas' => $request->input('personas'),
                'totalplanviaje' => $total,
                'horasalida' => $request->input('salida'),
                'horallegada' => $request->input('regreso'),
                'idactividad' => $request->input('actividad'),
                'montoconvocatoria' => $request->input('montoconvocatoria')        
        ]);

        session()->flash('success', 'Viaje actualizado exitosamente.');
        return redirect()->to('/viaticos/show/'.$viaje->idproyecto);

        }


    }



    public function destroyConfirm($id)
    {

        $viaje = DB::table('pre_viaje_local')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_viaje_local.idactividad')
        ->leftjoin('departamento', 'departamento.iddepartamento', '=', 'pre_viaje_local.iddepartamento')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_local.idfuente')
        ->select('pre_viaje_local.*', 'actividad.nombreactividad', 'departamento.departamento')
        ->where('pre_viaje_local.idpreviajelocal', '=', $id)
        ->first();
        

        return view('viaticos.delete', compact('viaje'));
    }


    public function destroy($cod)
    {

        $viaje = DB::table('pre_viaje_local')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_viaje_local.idactividad')
        ->leftjoin('departamento', 'departamento.iddepartamento', '=', 'pre_viaje_local.iddepartamento')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_local.idfuente')
        ->select('pre_viaje_local.*', 'actividad.nombreactividad', 'departamento.departamento')
        ->where('pre_viaje_local.idpreviajelocal', '=', $cod)
        ->first();
        

        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $viaje->idproyecto)
        ->first();

        $fuente = DB::table('pre_fuente')
        ->where('idfuente', '=', $viaje->idfuente)
        ->first();


        if ($fuente) {
            // code...
            //dd($codinventario);

            DB::table('presupuesto_inicial')
                ->where('idproyecto', $viaje->idproyecto)
                ->update([
                'montodisponible' => $p->montodisponible + $viaje->totalplanviaje,
                'montointernacionales' => $p->montonacionales + $viaje->montofuente,
                'montoconvocatoria' => $p->montoconvocatoria + $viaje->montoconvocatoria 
            ]);
            DB::table('pre_fuente')
                ->where('idfuente', $fuente->idfuente)
                ->update([
                'financiamiento' => $fuente->financiamiento + $viaje->montofuente
            ]);

        
            //dd($codinventario);
             $obj = DB::table('pre_viaje_local')
            ->where('idpreviajelocal', '=', $cod)
            ->delete();

            session()->flash('success', 'Viaje eliminado exitosamente.');
            return redirect()->to('/viaticos/internacionales/show/'.$viaje->idproyecto);

        } else {
            // code...
            DB::table('presupuesto_inicial')
                ->where('idproyecto', $viaje->idproyecto)
                ->update([
                'montodisponible' => $p->montodisponible + $viaje->totalplanviaje,
                'montoconvocatoria' => $p->montoconvocatoria + $viaje->montoconvocatoria 
            ]);

            //dd($codinventario);
             $obj = DB::table('pre_viaje_local')
            ->where('idpreviajelocal', '=', $cod)
            ->delete();
            
            session()->flash('success', 'Viaje eliminado exitosamente.');
            return redirect()->to('/viaticos/internacionales/show/'.$viaje->idproyecto);
        }



        session()->flash('success', 'Viaje eliminado exitosamente.');
        return redirect()->to('/viaticos/show/'.$viaje->idproyecto);
    }




    public function indexInt($cod)
    {

        $viaje = DB::table('pre_viaje_exterior')
        ->where('pre_viaje_exterior.idproyecto', '=', $cod)
        ->first();

       // dd($viaje);

        $actividades = DB::table('actividad')
        ->where('idproyecto', '=', $cod)
        ->orderby('nombreactividad')
        ->get();

        $paises = DB::table('pais')
        ->orderby('nombrepais')
        ->get();

       $fuentes = DB::table('pre_fuente')
        ->where('idproyecto', '=', $cod)
        ->where('idrubro', '=', 4)
        ->get();

        //dd($fuentes);


        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $cod)
        ->first();


        return view('viaticos.indexInt', compact('cod', 'actividades', 'fuentes', 'paises', 'viaje', 'p'));
    }



    public function showInt($cod)
    {

        $viaje = DB::table('pre_viaje_exterior')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_viaje_exterior.idactividad')
        ->leftjoin('pais', 'pais.idpais', '=', 'pre_viaje_exterior.idpais')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_exterior.idfuente')
        ->select('pre_viaje_exterior.*', 'actividad.nombreactividad', 'pais.nombrepais', 'pre_fuente.descripcionfuente')
        ->where('pre_viaje_exterior.idproyecto', '=', $cod)
        ->first();



        return view('viaticos.showInt', compact('cod', 'viaje'));
    }

    public function storeInt(Request $request){

        $pais = DB::table('pais')->where('idpais', '=', $request->input('pais'))->first();

        $fuente = DB::table('pre_fuente')
        ->where('idfuente', '=', $request->input('idfuente'))
        ->first();

        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $request->input('cod'))
        ->first();

        $total = ($request->input('costoboleto') * $request->input('numeropersonas')) + 
        ($request->input('costoinscripcion') * $request->input('numeropersonas')) +  
        ($pais->costo * $request->input('numeropersonas') * $request->input('numerodias'));

        if ($fuente) {
            // code...
            DB::table('pre_viaje_exterior')->insert([
                'idfuente' => $request->input('idfuente'),
                'idpais' => $request->input('pais'),
                'idproyecto' => $request->input('cod'),
                'destinoviaje' => $request->input('destino'),
                'numerodias' => $request->input('numerodias'),
                'cantidadpersonas' => $request->input('numeropersonas'),
                'totalplanviajeext' => $total,
                'costoboleto' => $request->input('costoboleto'),
                'inscripcionevento' => $request->input('costoinscripcion'),
                'idactividad' => $request->input('actividad'), 
                'montofuente' => $request->input('montofuente'),
                'montoconvocatoria' => $request->input('montoconvocatoria')
            ]);

            DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible - $total,
                    'montointernacionales' => $p->montointernacionales - $request->input('montofuente'),
                    'montoconvocatoria' => $p->montoconvocatoria - $request->input('montoconvocatoria') 

            ]);
            DB::table('pre_fuente')
                ->where('idfuente', $request->input('idfuente'))
                ->update([
                'financiamiento' => $fuente->financiamiento - $request->input('montofuente')
            ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado el viaje exitosamente.');
        return redirect()->to('/viaticos/internacionales/show/'.$request->input('cod'));

        } else {
            // code...
            DB::table('pre_viaje_exterior')->insert([
                'idpais' => $request->input('pais'),
                'idproyecto' => $request->input('cod'),
                'destinoviaje' => $request->input('destino'),
                'numerodias' => $request->input('numerodias'),
                'cantidadpersonas' => $request->input('numeropersonas'),
                'totalplanviajeext' => $total,
                'costoboleto' => $request->input('costoboleto'),
                'inscripcionevento' => $request->input('costoinscripcion'),
                'idactividad' => $request->input('actividad'), 
                'montoconvocatoria' => $request->input('montoconvocatoria')
            ]);

            DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible - $total,
                    'montoconvocatoria' => $p->montoconvocatoria - $request->input('montoconvocatoria') 

            ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado el viaje exitosamente.');

        return redirect()->to('/viaticos/internacionales/show/'.$request->input('cod'));
        }
    }    



    public function editInt($cod)
    {
        //dd($codinventario);


        $viaje = DB::table('pre_viaje_exterior')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_viaje_exterior.idactividad')
        ->leftjoin('pais', 'pais.idpais', '=', 'pre_viaje_exterior.idpais')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_exterior.idfuente')
        ->select('pre_viaje_exterior.*', 'actividad.nombreactividad', 'pais.nombrepais', 'pais.idpais','actividad.idactividad', 'pais.idpais', 'pre_fuente.descripcionfuente', 'pre_fuente.idfuente')
        ->where('pre_viaje_exterior.idpreviajeexterior', '=', $cod)
        ->first();


        $actividades = DB::table('actividad')
        ->where('idproyecto', '=', $viaje->idproyecto)
        ->orderby('nombreactividad')
        ->get();

        $paises = DB::table('pais')
        ->orderby('nombrepais')
        ->get();

        $pais = DB::table('pais')
        ->where('idpais', '=', $viaje->idpais)
        ->first();


        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $viaje->idproyecto)
        ->first();

       $fuentes = DB::table('pre_fuente')
        ->where('idfuente', '=', $viaje->idproyecto)
        ->where('idrubro', '=', 4)
        ->get();


       $fuente = DB::table('pre_fuente')
        ->where('idfuente', '=', $viaje->idfuente)
        ->first();

       $disponibleconv = $viaje->montoconvocatoria + $p->montoconvocatoria; 

        //dd($disponibleconv);

       if ($fuente) {
           // code...
        $disponiblefuente = $fuente->financiamiento + $viaje->montofuente;
        return view('viaticos.editInt', compact('viaje', 'actividades', 'paises', 'fuentes', 'p', 'pais', 'fuente', 'disponibleconv', 'disponiblefuente'));

       } else {
           // code...
        return view('viaticos.editInt', compact('viaje', 'actividades', 'paises', 'fuentes', 'p', 'pais', 'disponibleconv'));
       }
       


    }


     public function updateInt(Request $request)
    {
        //dd($request);
        $pais = DB::table('pais')->where('idpais', '=', $request->input('pais'))->first();
        $total = ($request->input('costoboleto') * $request->input('numeropersonas')) + 
        ($request->input('costoinscripcion') * $request->input('numeropersonas')) +  
        ($pais->costo * $request->input('numeropersonas') * $request->input('numerodias'));

        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $request->input('cod'))
        ->first();
    
         $total = ($request->input('costoboleto') * $request->input('numeropersonas')) + 
        ($request->input('costoinscripcion') * $request->input('numeropersonas')) +  
        ($pais->costo * $request->input('numeropersonas') * $request->input('numerodias'));

 
        $viaje = DB::table('pre_viaje_exterior')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_viaje_exterior.idactividad')
        ->leftjoin('pais', 'pais.idpais', '=', 'pre_viaje_exterior.idpais')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_exterior.idfuente')
        ->select('pre_viaje_exterior.*', 'actividad.nombreactividad', 'pais.nombrepais')
        ->where('pre_viaje_exterior.idproyecto', '=', $request->input('cod'))
        ->first();

        $fuente = DB::table('pre_fuente')
        ->where('idfuente', '=', $request->input('idfuente'))
        ->first();


        if ($fuente) {
            // code...
            DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible + $viaje->totalplanviajeext - $total,
                    'montointernacionales' => $p->montointernacionales + $viaje->montofuente - $request->input('montofuente'),
                    'montoconvocatoria' => $p->montoconvocatoria + $viaje->montoconvocatoria - $request->input('montoconvocatoria')

        ]);

        DB::table('pre_fuente')
            ->where('idfuente', $request->input('idfuente'))
            ->update([
            'financiamiento' => $fuente->financiamiento + $viaje->montofuente - $request->input('montofuente')
        ]);

        DB::table('pre_viaje_exterior')
        ->where('idpreviajeexterior', $request->input('idpreviajeexterior'))
        ->update([
            
                'idfuente' => $request->input('idfuente'),
                'idpais' => $request->input('pais'),
                'destinoviaje' => $request->input('destino'),
                'numerodias' => $request->input('numerodias'),
                'cantidadpersonas' => $request->input('numeropersonas'),
                'totalplanviajeext' => $total,
                'costoboleto' => $request->input('costoboleto'),
                'inscripcionevento' => $request->input('costoinscripcion'),
                'idactividad' => $request->input('actividad'), 
                'montofuente' => $request->input('montofuente'),
                'montoconvocatoria' => $request->input('montoconvocatoria')        
        ]);

        session()->flash('success', 'Viaje actualizado exitosamente.');
        return redirect()->to('/viaticos/internacionales/show/'.$viaje->idproyecto);


        } else {
            // code...
        DB::table('presupuesto_inicial')
                    ->where('idproyecto', $request->input('cod'))
                    ->update([
                    'montodisponible' => $p->montodisponible + $viaje->totalplanviajeext - $total,
                    'montointernacionales' => $p->montointernacionales + $viaje->montofuente - $request->input('montofuente'),
                    'montoconvocatoria' => $p->montoconvocatoria + $viaje->montoconvocatoria - $request->input('montoconvocatoria')

        ]);

        DB::table('pre_viaje_exterior')
        ->where('idpreviajeexterior', $request->input('idpreviajeexterior'))
        ->update([
            
                'idfuente' => $request->input('idfuente'),
                'idpais' => $request->input('pais'),
                'destinoviaje' => $request->input('destino'),
                'numerodias' => $request->input('numerodias'),
                'cantidadpersonas' => $request->input('numeropersonas'),
                'totalplanviajeext' => $total,
                'costoboleto' => $request->input('costoboleto'),
                'inscripcionevento' => $request->input('costoinscripcion'),
                'idactividad' => $request->input('actividad'), 
                'montofuente' => $request->input('montofuente'),
                'montoconvocatoria' => $request->input('montoconvocatoria')        
        ]);

        session()->flash('success', 'Viaje actualizado exitosamente.');
        return redirect()->to('/viaticos/internacionales/show/'.$viaje->idproyecto);

        }
        
        


    }


    public function destroyConfirmInt($id)
    {

        $viaje = DB::table('pre_viaje_exterior')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_viaje_exterior.idactividad')
        ->leftjoin('pais', 'pais.idpais', '=', 'pre_viaje_exterior.idpais')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_exterior.idfuente')
        ->select('pre_viaje_exterior.*', 'actividad.nombreactividad', 'pais.nombrepais', 'pais.costo', 'pre_fuente.descripcionfuente')
        ->where('pre_viaje_exterior.idpreviajeexterior', '=', $id)
        ->first();

        

        return view('viaticos.deleteInt', compact('viaje'));
    }


    public function destroyInt($cod)
    {
        $viaje = DB::table('pre_viaje_exterior')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_viaje_exterior.idactividad')
        ->leftjoin('pais', 'pais.idpais', '=', 'pre_viaje_exterior.idpais')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_exterior.idfuente')
        ->select('pre_viaje_exterior.*', 'actividad.nombreactividad', 'pais.nombrepais')
        ->where('pre_viaje_exterior.idpreviajeexterior', '=', $cod)
        ->first();

        $p = DB::table('presupuesto_inicial')
        ->where('idproyecto', '=', $viaje->idproyecto)
        ->first();

        $fuente = DB::table('pre_fuente')
        ->where('idfuente', '=', $viaje->idfuente)
        ->first();
                
        if ($fuente) {
            // code...
            //dd($codinventario);

            DB::table('presupuesto_inicial')
                ->where('idproyecto', $viaje->idproyecto)
                ->update([
                'montodisponible' => $p->montodisponible + $viaje->totalplanviajeext,
                'montointernacionales' => $p->montointernacionales + $viaje->montofuente,
                'montoconvocatoria' => $p->montoconvocatoria + $viaje->montoconvocatoria 
            ]);
            DB::table('pre_fuente')
                ->where('idfuente', $fuente->idfuente)
                ->update([
                'financiamiento' => $fuente->financiamiento + $viaje->montofuente
            ]);

            $v = DB::table('pre_viaje_exterior')
            ->where('idpreviajeexterior', '=', $cod)
            ->delete();

            session()->flash('success', 'Viaje eliminado exitosamente.');
            return redirect()->to('/viaticos/internacionales/show/'.$viaje->idproyecto);

        } else {
            // code...
            DB::table('presupuesto_inicial')
                ->where('idproyecto', $viaje->idproyecto)
                ->update([
                'montodisponible' => $p->montodisponible + $viaje->totalplanviajeext,
                'montointernacionales' => $p->montointernacionales + $viaje->montofuente,
                'montoconvocatoria' => $p->montoconvocatoria + $viaje->montoconvocatoria 
            ]);

            $v = DB::table('pre_viaje_exterior')
            ->where('idpreviajeexterior', '=', $cod)
            ->delete();

            session()->flash('success', 'Viaje eliminado exitosamente.');
            return redirect()->to('/viaticos/internacionales/show/'.$viaje->idproyecto);
        }
        

    }

    public function end($cod){


        DB::table('pasos_presupuesto')
        ->where('idproyecto', $cod)
        ->update([
            'nacionales' => 1    

        ]);

        session()->flash('success', 'Viajes nacionales completados.');
        return redirect()->to('/presupuesto/show/menu/'.$cod);

    }

    public function endInt($cod){


        DB::table('pasos_presupuesto')
        ->where('idproyecto', $cod)
        ->update([
            'internacionales' => 1    

        ]);

        session()->flash('success', 'Viajes internacionales completados.');
        return redirect()->to('/presupuesto/show/menu/'.$cod);

    }
}
