<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Locaciones_de_unidadesController extends Controller
{
    public function index(){
        return view('layouts.infraestructura');
    }

    public function create(){
        //formulario para crear registro
    }
    public function store(Request $request){
        //guardar el registro en la BD
    }
    public function show(Locaciones_de_unidades $locacines){
        //mostrar un registro por ID
    }
    public function edit(Locaciones_de_unidades $locacines){
        //formulario para editar registro
    }

    public function update(){
        //guardar cambio de registro en la BD
    }
    public function destroy(Locaciones_de_unidades $locacines){
        //elimina un registro de la BD
    }
    
}
