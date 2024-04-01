<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_infraestructuras;
class catInfraestructurasController extends Controller
{
    
 public function index(){
    $infraArray=T_infraestructuras::all();
    return view('layouts.catInfraestructura',compact('infraArray'));
}

public function create(){
    //formulario para crear registro
}
public function store(Request $request){
    //guardar el registro en la BD

   $validated= $request->validate([
        'nombre'=>['required'],
        'descripcion'=>['required']
    ]);
  
    $infraestructura=new T_infraestructuras();
    $infraestructura->nombre_t_infra=$request->post('nombre');
    $infraestructura->descrip_t_infra=$request->post('descripcion');

    $infraestructura->save();
    return redirect()->route("tpInfra")->with("success","Registro agregado con exito");
}
public function show($id){
    //mostrar un registro por ID
    $elemento=T_infraestructuras::find($id);
    return view('layouts.eliminarCatInfra',compact('elemento'));

}
public function edit($id){
  
    $packEdit=T_infraestructuras::find($id);
    return view('layouts.catInfraEstructuraUp',compact('packEdit'));
}

public function update(Request $request,$id){
    $validated= $request->validate([
        'nombre'=>['required'],
        'descripcion'=>['required']
    ]);
    //guardar cambio de registro en la BD
    $infraestructura=T_infraestructuras::find($id);
    $infraestructura->nombre_t_infra=$request->post('nombre');
    $infraestructura->descrip_t_infra=$request->post('descripcion');
    $infraestructura->save();
    return redirect()->route("tpInfra")->with("success","Registro modificado con exito");
}
public function destroy($id){
    //elimina un registro de la BD
    $infraestructura=T_infraestructuras::find($id);
    $infraestructura->delete();
    return redirect()->route("tpInfra")->with("success","Registro Eliminado con exito");
}

}