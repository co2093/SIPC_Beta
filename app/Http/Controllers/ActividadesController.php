<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    //

    public function index()
    {
        return view('actividades.index');
    }



    public function show()
    {
        return view('actividades.show');
    }
}
