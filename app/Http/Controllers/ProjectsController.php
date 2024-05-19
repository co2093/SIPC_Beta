<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    //


    public function index()
    {
        return view('projects.index');
    }



    public function show()
    {
        return view('projects.show');
    }



    public function objetivos()
    {
        return view('projects.objetivos');
    }


    public function prueba()
    {
        return view('projects.prueba');
    }

    public function protocolo()
    {
        return view('projects.protocolo');
    }

    public function enviar()
    {
        return view('projects.enviar');
    }




    public function archivadosshow()
    {
        return view('projects.archivadosshow');
    }

    public function archivadosindex()
    {
        return view('projects.archivadosindex');
    }

}
