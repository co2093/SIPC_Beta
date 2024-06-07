<?php

namespace App\Http\Controllers\Investigador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class InvestigadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function formacionAcademica()
    {
        return view('Investigador.formacionAcademica');
    }
    public function experienciaLaboral()
    {
        return view('Investigador.experienciaLaboral');
    }
    public function experienciaCientifica()
    {
        return view('Investigador.experienciaCientifica');
    }
    public function otrasCompetencias()
    {
        return view('Investigador.otrasCompetencias');
    }
    public function redInvestigador(){
        return view('Investigador.redInvestigador');
    }
    public function proyectoInvestigacion(){
        return view('Investigador.proyectosDeInvestigacion');
    }
    public function datosPersonales(Request $request){

        $persona = DB::table('persona')->where('id', auth()->user()->id)->first();
        if ($request->isMethod('get')){
            
            return view('Investigador.datosPersonales',  compact(['persona']));
        }
        elseif ($request->isMethod('post')) {
            //Tabla persona
        DB::table('persona')
    ->where('id', auth()->user()->id)
    ->update([
        'nombrepersona' => $request->nombre, 
        'apellidopersona' => $request->apellido, 
        'orcid' => $request->ORCID,
        'genero' => $request->sexo,
        'fechanacimiento' => $request->fechaDeNacimiento,
        'facultadactual' => $request->facultadActual,
        'telefono' => $request->telefono,
        'email' => auth()->user()->email,
        'cargoactual' => $request->cargoActual,
    ]);
    return Redirect::refresh();
        //Crear tabla de social, docencia y reconocimiento
        }
    }
}