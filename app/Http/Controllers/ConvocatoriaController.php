<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Illuminate\Support\Facades\Mail; 


class ConvocatoriaController extends Controller
{
    //

    public function index()
    {


        return view('convocatoria.index');


    }



    public function show()
    {
        $convocatorias = DB::table('convocatoria')
        ->orderby('estado')
        ->get();

        //dd($convocatorias);
        return view('convocatoria.show', compact('convocatorias'));
    }

    public function store(Request $request){

        $time = $request->input('fechainicio');
        $date = new Carbon( $time );  

        $activa = "Activa";
        $estado = $request->input('estado');

        $convocatoria = DB::table('convocatoria')
        ->where('estadodescr', '=', $activa)
        ->first();

        if ($estado == "Inactiva") {
            // code...

        DB::table('convocatoria')->insert([

            'fechainicio' => $request->input('fechainicio'),
            'fechafin' => $request->input('fechafin'),
            'presupuesto' => $request->input('presupuesto'),
            'observacion' => $request->input('observacion'),
            'numeroconvocatoria' => $request->input('codigo'),
            'anoconvocatoria' => $date->year,
            'estadodescr' => $request->input('estado')

        ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha iniciado una nueva convocatoria: '.$request->input('codigo'));

        return redirect()->route('convocatoria.show');

        } else {
            // code...
            if ($convocatoria) {
                // code...
            session()->flash('error', 'La siguiente convocatoria está activa: '.$convocatoria->numeroconvocatoria.'. Debe deshabilitarla primero.');
            return redirect()->route('convocatoria.show');

            } else {
                // code...
            DB::table('convocatoria')->insert([

            'fechainicio' => $request->input('fechainicio'),
            'fechafin' => $request->input('fechafin'),
            'presupuesto' => $request->input('presupuesto'),
            'observacion' => $request->input('observacion'),
            'numeroconvocatoria' => $request->input('codigo'),
            'anoconvocatoria' => $date->year,
            'estadodescr' => $request->input('estado')

            ]);

        session()->flash('success', 'Se ha iniciado una nueva convocatoria: '.$request->input('codigo'));

        return redirect()->route('convocatoria.show');

            }
            


        }
        




    } 

    public function edit($id)
    {

 
       
        $convocatoria = DB::table('convocatoria')
        ->where('idconvocatoria', '=', $id)
        ->first();


        return view('convocatoria.edit', compact('convocatoria'));
    }



     public function update(Request $request)
    {
        $id = $request->input('idconvocatoria');

        $time = $request->input('fechainicio');
        $date = new Carbon( $time );  

        $activa = "Activa";
        $estado = $request->input('estado');

        $convocatoriaactiva = DB::table('convocatoria')
        ->where('estadodescr', '=', $activa)
        ->first();


         $convocatoria = DB::table('convocatoria')
        ->where('idconvocatoria', '=', $id)
        ->first();

        $estadoactual = $convocatoria->estadodescr;

        if($estadoactual!=$estado){

            if ($estado != $activa) {
                // code...
            DB::table('convocatoria')
            ->where('idconvocatoria', $request->input('idconvocatoria'))
            ->update([
               'fechainicio' => $request->input('fechainicio'),
                'fechafin' => $request->input('fechafin'),
                'presupuesto' => $request->input('presupuesto'),
                'observacion' => $request->input('observacion'),
                'numeroconvocatoria' => $request->input('codigo'),
                'anoconvocatoria' => $date->year,
                'estadodescr' => $request->input('estado')
            ]);

            session()->flash('success', 'Convocatoria actualizada exitosamente.');
            return redirect()->route('convocatoria.show');


            } else {
                // code...
            session()->flash('error', 'La siguiente convocatoria está activa: '.$convocatoria->numeroconvocatoria.'. Debe deshabilitarla primero.');
            return redirect()->route('convocatoria.show');

            }
            

        }else{

        DB::table('convocatoria')
        ->where('idconvocatoria', $request->input('idconvocatoria'))
        ->update([
           'fechainicio' => $request->input('fechainicio'),
            'fechafin' => $request->input('fechafin'),
            'presupuesto' => $request->input('presupuesto'),
            'observacion' => $request->input('observacion'),
            'numeroconvocatoria' => $request->input('codigo'),
            'anoconvocatoria' => $date->year,
            'estadodescr' => $request->input('estado')
        ]);

        session()->flash('success', 'Convocatoria actualizada exitosamente.');
        return redirect()->route('convocatoria.show');

        }


    }


    public function enviar()
    {
       $activa = "Activa";

        $convocatorias = DB::table('convocatoria')
        ->where('estadodescr', '=', $activa)
        ->get();

        return view('convocatoria.notificar', compact('convocatorias'));
    } 



    public function notificacion(Request $request){

        
        $destinatarios = DB::table('usuarios_prueba')->get();

        $convocatoria = DB::table('convocatoria')
            ->where('idconvocatoria', '=', $request->input('idconvocatoria'))
            ->first();

        $attachmentPath = $request->file('attachment')->getRealPath(); // Obtener la ruta del archivo una vez

        $data = [
            'comentarios' => $request->input('comentarios')
        ];

        // Enviar a cada usuario
        foreach ($destinatarios as $user) {
            Mail::send('convocatoria.mensaje', $data, function ($message) use ($user, $data, $convocatoria, $attachmentPath) {
                $message->to($user->email)
                        ->subject($convocatoria->idconvocatoria)
                        ->attach($attachmentPath, [
                            'as' => 'detalles_convocatoria.pdf',
                            'mime' => 'application/pdf',
                        ]);
            });
        }

        return back()->with('success', 'Se ha enviado la notificación a todos los usuarios exitosamente.');


    } 
}
