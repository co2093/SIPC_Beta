<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
{
    //

    public function index()
    {
        return view('convocatoria.index');
    }



    public function show()
    {
        return view('convocatoria.show');
    }
}
