<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjetivosController extends Controller
{
    //


   public function index()
    {
        return view('objetivos.index');
    }



    public function show()
    {
        return view('objetivos.show');
    }


}
