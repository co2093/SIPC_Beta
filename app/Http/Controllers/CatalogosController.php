<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
