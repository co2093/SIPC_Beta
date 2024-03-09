<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresupuestoController extends Controller
{
    //
    public function index()
    {
        return view('presupuesto.index');
    }



    public function show()
    {
        return view('presupuesto.show');
    }
}
