<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    //
    public function index()
    {
        return view('personal.index');
    }



    public function show()
    {
        return view('personal.show');
    }
}
