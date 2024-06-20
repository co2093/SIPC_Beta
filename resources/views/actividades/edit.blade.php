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

        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $act->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{ route('actividades.show', $act->idproyecto) }}">Actividades</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar actividad</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Editar detalles de la actividad</h6>
                    </div>

                    <div class="card-body">
                
                    <form method="POST" action="{{ route('actividades.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf




                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Objetivo específico asociado</label>
                        <select class="form-control" name="objetivo">
                        <option value="{{$obje->idobjetivo}}">{{$obje->descripcion}}</option>    
                        @foreach($obj as $o)
                        @if($obje->idobjetivo != $o->idobjetivo)
                            <option value="{{$o->idobjetivo}}">{{$o->descripcion}}</option>
                        @endif   
                        @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="hidden" value="{{$act->idproyecto}}" name="cod" >
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="{{$act->idactividad}}" name="idactividad" >
                    </div>

                    <div class="form-group">
                    
                        <label for="exampleFormControlTextarea1">Actividad</label>
                        <textarea class="form-control" id="Descripcion corta" rows="3" name="actividad" required>{{$act->nombreactividad}}</textarea>
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de actividad</label>
                        <select class="form-control" name="tipo">
                        <option value="{{$tp->idtipoactividad}}">{{$tp->nombretipoactividad}}</option>    
                        @foreach($tipo as $t)
                            @if($tp->idtipoactividad != $t->idtipoactividad)
                            <option value="{{$t->idtipoactividad}}">{{$t->nombretipoactividad}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>



                
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de inicio</label>
                        <input type="date" class="form-control" name="inicio"  value="{{$act->fechainicioactividad}}">
                    </div>

                  <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de finalización</label>
                        <input type="date" class="form-control" name="fin" value="{{$act->fechafinactividad}}">
                    </div>

                      <button type="submit" class="btn btn-danger">Guardar</button>
                    <a  class="btn btn-secondary float-right" href="{{route('actividades.show', $act->idproyecto)}}">Regresar</a>


                    </form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
