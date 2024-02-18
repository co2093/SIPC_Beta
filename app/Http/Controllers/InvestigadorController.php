<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestigadorController extends Controller
{
    public function index()
    {
        $investigadores = Investigador::all();
        return view('investigadores.index')->with('investigadores', $investigadores);
    }

    public function create()
    {
        return view('investigadores.create');
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {
        return view('investigadores.edit');

    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
