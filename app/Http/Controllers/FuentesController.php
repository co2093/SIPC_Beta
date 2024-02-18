<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuentesController extends Controller
{
    //

    public function index()
    {
        return view('fuentes.index');
    }



    public function show()
    {
        return view('fuentes.show');
    }
}

