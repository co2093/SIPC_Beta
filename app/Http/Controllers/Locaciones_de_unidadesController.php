<?php

namespace App\Http\Controllers;

use App\Models\Locaciones_de_unidades;
use App\Models\T_infraestructuras;
use Illuminate\Http\Request;

class Locaciones_de_unidadesController extends Controller
{
    private $infraestructuraModel;

    public function index(){
        $proyectosArray=Locaciones_de_unidades::getProyects();
        $coleccion_locacion=Locaciones_de_unidades::all();
        $infraestructuras=T_infraestructuras::all();   
        return view('layouts.infraestructura',compact('coleccion_locacion','proyectosArray','infraestructuras'));
    }

    public function create(){
        //formulario para crear registro
    }
    public function store(Request $request){
        //guardar el registro en la BD
        //var_dump($_POST);
        $locaciones=new Locaciones_de_unidades();
        $locaciones->id_proyecto=$request->post('proyecto');
        $locaciones->area_locacion=$request->post('area_construida');
        $locaciones->id_t_infra=$request->post('tipo_infraestructura');
        $locaciones->save();
        return redirect()->route("homeInfraestructura")->with("success","Registro agregado con exito");
    }
    public function show($id){
        $proyectosArray=Locaciones_de_unidades::findByIdCustom($id);
        $coleccion_locacion=Locaciones_de_unidades::find($id);
        $infraestructuras=Locaciones_de_unidades::find($id)->t_infraestructuras;;   
        //mostrar un registro por ID
      
        return view('layouts.eliminar',compact('coleccion_locacion','proyectosArray','infraestructuras'));

    }
    public function edit($id){
        //formulario para editar registro
        //$packEdit=Locaciones_de_unidades::findByIdCustom($id);
        $packEdit=Locaciones_de_unidades::find($id);
        $infraestructuraSelectd=Locaciones_de_unidades::find($id)->t_infraestructuras;
        $packProyectos=Locaciones_de_unidades::getProyects();
        $infraestructuras=T_infraestructuras::all();   
        return view('layouts.editInfraestructura',compact('packEdit','packProyectos','infraestructuraSelectd','infraestructuras'));
    }

    public function update(Request $request,$id){
        //guardar cambio de registro en la BD
        $locaciones=Locaciones_de_unidades::find($id);
        $locaciones->id_proyecto=$request->post('proyecto');
        $locaciones->area_locacion=$request->post('area_construida');
        $locaciones->id_t_infra=$request->post('tipo_infraestructura');
        $locaciones->save();
        return redirect()->route("homeInfraestructura")->with("success","Registro modificado con exito");
    }
    public function destroy( $id,Request $request){
        Locaciones_de_unidades::find($id)->delete();
        return redirect()->route("homeInfraestructura")->with("success","Elementoe liminado exitosamente");
    }
    
}
