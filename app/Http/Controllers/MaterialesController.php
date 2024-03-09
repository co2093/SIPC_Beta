<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialesController extends Controller
{
    //

    public function index()
    {
        return view('materiales.index');
    }



    public function show()
    {
        return view('materiales.show');
    }
}
