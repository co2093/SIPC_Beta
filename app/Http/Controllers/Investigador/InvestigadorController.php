<?php

namespace App\Http\Controllers\Investigador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function publicaciones()
    {
        return view('Investigador.publicaciones');
    }
}
