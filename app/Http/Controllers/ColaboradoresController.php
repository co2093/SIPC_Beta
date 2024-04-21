<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColaboradoresController extends Controller
{
    
    //
    public function index()
    {
        return view('colaboradores.index');
    }



    public function show()
    {
        return view('colaboradores.show');
    }
}
