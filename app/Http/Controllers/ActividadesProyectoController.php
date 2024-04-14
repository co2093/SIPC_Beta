<?php

namespace App\Http\Controllers;

use App\Models\AreaDeConocimiento;
use App\Models\Investigador;
use App\Models\Proyecto;
use App\Models\LineaDeInvestigacion;
use App\Models\ActividadDeProyecto;
use Illuminate\Http\Request;

class ActividadesProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $actividadesProyectos = Proyecto::all();
        return view('actividadesProyectos.index')
            ->with(
                'actividadesProyectos',
                $actividadesProyectos
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //definicion de los modelos a usar
        $investigadores = Investigador::all();
        $areas = AreaDeConocimiento::all();
        $lineas = LineaDeInvestigacion::all();
        return view(
            'actividadesProyectos.create',
            compact(
                'investigadores',
                'areas',
                'lineas',
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
