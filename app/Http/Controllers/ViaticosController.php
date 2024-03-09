<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViaticosController extends Controller
{
    //
    public function index()
    {
        return view('viaticos.index');
    }



    public function show()
    {
        return view('viaticos.show');
    }
    


    public function indexInt()
    {
        return view('viaticos.indexInt');
    }



    public function showInt()
    {
        return view('viaticos.showInt');
    }
}
