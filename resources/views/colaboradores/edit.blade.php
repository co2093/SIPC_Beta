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

        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $col->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{ route('colaboradores.show', $col->idproyecto) }}">Colaboradores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar colaborador</li>
      </ol>
    </nav>

     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Editar colaborador</h6>
                    </div>

                    <div class="card-body">
                
                    <form method="POST" action="{{ route('colaboradores.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf
                    <div class="form-group">
                        <input type="hidden" value="{{$col->idcolaborador}}" name="cod" >
                    </div>

                <div class="form-group">
                        <input type="hidden" value="{{$col->idproyecto}}" name="idproyecto" >
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre completo</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre completo" value="{{$col->nombrecompleto}}">
                      </div>



                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Ad Honorem</label>
                        <select class="form-control" name="adhonorem">
                          <option value="1">Sí</option>
                          <option value="2">No</option>
    
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Facultad</label>
                        <select class="form-control" name="facultad">
                            <option value="{{$facu->idfacultad}}">{{$facu->nombrefacultad}}</option>
                            
                            @foreach($facultades as $f)
                            @if($f->idfacultad != $facu->idfacultad)
                                <option value="{{$f->idfacultad}}">{{$f->nombrefacultad}}</option>
                            @endif
                            @endforeach

                        </select>
                      </div>



                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Sexo</label>
                        <select class="form-control" name="sexo">
                        @if($col->sexo == 1)
                          <option value="1">Masculino</option>
                          @else
                          <option value="2">Femenino</option>
                        @endif    
                        </select>
                      </div>
                      

                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo</label>
                        <select class="form-control" name="tipo">
                        <option value="{{$tp->idtipo}}">{{$tp->nombretipocolaborador}}</option>
                            @foreach($tipo as $t)
                            @if($t->idtipo != $tp->idtipo)
                                <option value="{{$t->idtipo}}">{{$t->nombretipocolaborador}}</option>
                            @endif
                            @endforeach
    
                        </select>
                      </div>

                      <button type="submit" class="btn btn-danger">Guardar</button>
                      <a  class="btn btn-secondary float-right" href="{{route('colaboradores.show', $col->idproyecto)}}">Regresar</a>


                    </form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
