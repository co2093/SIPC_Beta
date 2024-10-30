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
        ->where('estado', '=', 1)
        ->get();

        //dd($convocatorias);
        return view('convocatoria.show', compact('convocatorias'));
    }

    public function store(Request $request){

        $time = $request->input('fechainicio');
        $date = new Carbon( $time );  


        DB::table('convocatoria')->insert([

          //  'idconvocatoria' => $request->input('codigo'),
            'fechainicio' => $request->input('fechainicio'),
            'fechafin' => $request->input('fechafin'),
            'presupuesto' => $request->input('presupuesto'),
            'observacion' => $request->input('observacion'),
            'numeroconvocatoria' => $request->input('codigo'),
            'anoconvocatoria' => $date->year,
            'estado' => 1


        ]);

    //flash('Producto agregado al inventario exitosamente', 'success');
    session()->flash('success', 'Se ha iniciado una nueva convocatoria: '.$request->input('codigo'));

    return redirect()->route('convocatoria.show');

    } 

    public function enviar()
    {
        $convocatorias = DB::table('convocatoria')->get();

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
