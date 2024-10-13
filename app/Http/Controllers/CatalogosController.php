<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Auth;


class CatalogosController extends Controller
{
    //
    public function indexAreas()
    {
        return view('catalogos.indexArea');
    }



    public function showAreas()
    {
        return view('catalogos.showArea');
    }

        public function indexActividades()
    {
        return view('catalogos.indexActividad');
    }



    public function showActividades()
    {
        return view('catalogos.showActividad');
    }

        public function indexInstituciones()
    {
        return view('catalogos.indexInstitucion');
    }



    public function showInstituciones()
    {
        return view('catalogos.showInstitucion');
    }

        public function indexRecursos()
    {
        return view('catalogos.indexRecurso');
    }



    public function showRecursos()
    {
        return view('catalogos.showRecurso');
    }

        public function indexUnidades()
    {
        return view('catalogos.indexUnidadMedida');
    }



    public function showUnidades()
    {
        return view('catalogos.showUnidadMedida');
    }

        public function indexFacultades()
    {
        return view('catalogos.indexFacultad');
    }



    public function showFacultades()
    {
        return view('catalogos.showFacultad');
    }

        public function indexTipopublicaciones()
    {
        return view('catalogos.indexPublicacion');
    }



    public function showTipopublicaciones()
    {
        return view('catalogos.showPublicacion');
    }

    
     public function indexPais()
    {
        

        return view('catalogos.indexPais');
    }



    public function showPais()
    {

        $paises = DB::table('pais')
        ->orderBy('nombrepais')  // Ordena por el nombre del país
        ->paginate(30);
        //dd($paises);

        return view('catalogos.showPais', compact('paises'));
    }


    public function storePais(Request $request){

        //dd($request);

        $iso = DB::table('pais')
        ->where('iso', '=', $request->input('iso'))
        ->first();


        if ($iso) {
            // code...
        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('error', 'Ya existe el país que está registrando.');

        return redirect()->to('/catalogos/pais/show/');
        } else {
            // code...
        DB::table('pais')->insert([
            'nombrepais' => $request->input('nombrepais'),
            'iso' => $request->input('iso'),
            'costo' => $request->input('costo')
        ]);

        //flash('Producto agregado al inventario exitosamente', 'success');
        session()->flash('success', 'Se ha registrado al nuevo pais.');

        return redirect()->to('/catalogos/pais/show/');
        }
        


    }    




    public function editPais($id)
    {
        $pais = DB::table('pais')
        ->where('idpais', '=', $id)
        ->first();


        return view('catalogos.editPais', compact('pais'));
    }



     public function updatePais(Request $request)
    {

       // dd($request);

        DB::table('pais')
        ->where('idpais', $request->input('idpais'))
        ->update([
            'nombrepais' => $request->input('nombrepais'),
            'iso' => $request->input('iso'),
            'costo' => $request->input('costo')
        ]);


                

        session()->flash('success', 'País actualizado exitosamente.');
        return redirect()->to('/catalogos/pais/show/');

    }

    public function destroyConfirmPais($id)
    {
        
        $pais = DB::table('pais')
        ->where('idpais', '=', $id)
        ->first();

        return view('catalogos.deletePais', compact('pais'));
    }



    public function destroyPais($cod)
    {

     $xp = DB::table('experiencia_laboral')
     ->where('idpais', '=', $cod)
     ->first();

     $vi = DB::table('pre_viaje_exterior')
     ->where('idpais', '=', $cod)
     ->first();  

     if ($xp or $vi) {
         // code...

        session()->flash('error', 'No se puede eliminar al país porque está en uso.');

        return redirect()->to('/catalogos/pais/show/');


     } else {
         // code...
         $pais = DB::table('pais')
        ->where('idpais', '=', $cod)
        ->delete();

        session()->flash('success', 'País eliminado correctamente.');

        return redirect()->to('/catalogos/pais/show/');
     }
     

    }

}
