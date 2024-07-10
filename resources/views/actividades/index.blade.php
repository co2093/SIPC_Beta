@extends('layouts.default')
@section('content')




    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>

        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $cod)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{ route('actividades.show', $cod) }}">Actividades</a></li>
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
               <form method="POST" action="{{ route('actividades.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Objetivo específico asociado</label>
                        <select class="form-control" name="objetivo">
                        @foreach($obj as $o)
                            <option value="{{$o->idobjetivo}}">{{$o->descripcion}}</option>
                        @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="hidden" value="{{$cod}}" name="cod" >
                    </div>

                    <div class="form-group">
                    
                        <label for="exampleFormControlTextarea1">Actividad</label>
                        <textarea class="form-control" id="Descripcion corta" rows="3" name="actividad" required></textarea>
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de actividad</label>
                        <select class="form-control" name="tipo">
                        @foreach($tipo as $t)
                            <option value="{{$t->idtipoactividad}}">{{$t->nombretipoactividad}}</option>
                        @endforeach
                        </select>
                    </div>



                
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de inicio</label>
                        <input type="date" class="form-control" name="inicio" min="01/01/2024">
                    </div>

                  <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de finalización</label>
                        <input type="date" class="form-control" name="final" >
                    </div>


                      <button type="submit" class="btn btn-danger">Guardar</button>
                    <a  class="btn btn-secondary float-right" href="{{route('actividades.show', $cod)}}">Regresar</a>

                    </form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
