@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Objetivos del Proyecto de investigación</h1>
    </div>



    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>

        <li class="breadcrumb-item"><a href="{{route('projects.prueba')}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{ route('objetivos.show') }}">Objetivos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Crear objetivo</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Definir objetivos del proyecto de investigación</h6>
                    </div>

                    <div class="card-body">
                
                    <form>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Objetivo general</label>
                        <textarea class="form-control" id="Descripcion corta" rows="3"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Objetivo especifico 1</label>
                        <textarea class="form-control" id="Descripcion corta" rows="3"></textarea>
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Objetivo especifico 2</label>
                        <textarea class="form-control" id="Descripcion corta" rows="3"></textarea>
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Objetivo especifico 3</label>
                        <textarea class="form-control" id="Descripcion corta" rows="3"></textarea>
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Objetivo especifico 4</label>
                        <textarea class="form-control" id="Descripcion corta" rows="3"></textarea>
                    </div>




                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Objetivo especifico 5</label>
                        <textarea class="form-control" id="Descripcion corta" rows="3"></textarea>
                    </div>




                      <button type="submit" class="btn btn-danger">Submit</button>
                    <a  class="btn btn-secondary float-right" href="{{route('objetivos.show')}}">Regresar</a>


                    </form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
