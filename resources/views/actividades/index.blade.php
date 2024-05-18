@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Actividades del Proyecto de investigación</h1>
    </div>


    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>

        <li class="breadcrumb-item"><a href="{{route('projects.prueba')}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{ route('actividades.show') }}">Actividades</a></li>
        <li class="breadcrumb-item active" aria-current="page">Crear actividad</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Definir actividades del proyecto de investigación</h6>
                    </div>

                    <div class="card-body">
                
                    <form>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Objetivo específico asociado</label>
                        <select class="form-control" id="objetivo">
                          <option>Objetivo 1</option>
                          <option>Objetivo 2</option>
                          <option>Objetivo 3</option>
                          <option>Objetivo 4</option>
                          <option>Objetivo 5</option>
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Nombre de la actividad</label>
                        <input type="text" class="form-control" id="actividad" >
                    </div>





                    <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de inicio</label>
                        <input type="date" class="form-control" id="inicio" >
                    </div>

                  <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de finalización</label>
                        <input type="date" class="form-control" id="final" >
                    </div>


                      <button type="submit" class="btn btn-danger">Submit</button>
                    <a  class="btn btn-secondary float-right" href="{{route('actividades.show')}}">Regresar</a>

                    </form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
