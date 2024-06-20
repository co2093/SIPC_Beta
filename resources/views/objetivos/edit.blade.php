@extends('layouts.default')
@section('content')
@if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
@endif


    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>

        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $obj->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{ route('objetivos.show', $obj->idproyecto) }}">Objetivos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar objetivo</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Definir objetivos del proyecto de investigación</h6>
                    </div>

                    <div class="card-body">
                
                    <form method="POST" action="{{ route('objetivos.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf




                    <div class="form-group">
                        <input type="hidden" value="{{$obj->idobjetivo}}" name="idobjetivo" >
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Objetivo</label>
                        <textarea class="form-control" id="Descripcion corta" rows="3" name="descripcion" required>{{$obj->descripcion}}</textarea>
                    </div>

                      <button type="submit" class="btn btn-danger">Guardar</button>
                    <a  class="btn btn-secondary float-right" href="{{route('objetivos.show', $obj->idproyecto)}}">Regresar</a>


                    </form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
