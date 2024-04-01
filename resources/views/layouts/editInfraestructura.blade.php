@extends('layouts.default')
@section('content')
<div class="container">    
<div class="row">
    <div class="col-md-12">
      @if($mensaje=Session::get('success'))
        <div class="alert alert-success" role="alert">
          {{$mensaje}}
        </div>
      @endif
    </div>
  </div>
    <form action="{{route('upInfraestructura',$packEdit->id_t_infra)}}" method="POST">
      @csrf
      @method("PUT")
  <div class="form-group">
    <div class="row">
      <div class="col-md-9">
        <h1>Infraestructuras/Proyecto</h1>
        <h4>Modificar registro</h4>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-md-9">
        <select class="custom-select" id="tipo_infraestructura" name="tipo_infraestructura">
          <option value="">Seleccione un tipo de infraestructura</option>
          @foreach($infraestructuras as $infr)
            @if($infr->id_t_infra==$infraestructuraSelectd[0]->id_t_infra)
                <option selected value="{{$infraestructuraSelectd[0]->id_t_infra}}">{{$infraestructuraSelectd[0]->nombre_t_infra}}</option>
              @else
                <option value="{{$infr->id_t_infra}}">{{$infr->nombre_t_infra}}</option>
            @endif
          @endforeach
        </select>
        @error('tipo_infraestructura')
            <small style="color:red">{{$message}}</small>
          @enderror
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-md-9">
        <select class="custom-select" id="proyecto" name ="proyecto">
          <option value="">Seleccione un tipo de proyecto asociado</option>
          @foreach($packProyectos as $project)
            @if($project->id_proyecto==$packEdit->id_proyecto)
                <option selected value="{{$project->id_proyecto}}">{{$project->nombre_proyecto}}</option>
              @else
                <option value="{{$project->id_proyecto}}">{{$project->nombre_proyecto}}</option>
            @endif
          @endforeach
        </select>
        @error('proyecto')
            <small style="color:red">{{$message}}</small>
          @enderror
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <div class="row">
      <div class="col-md-9">
        <label for="area_construida">Area Construida</label>
        <input type="number" class="form-control" id="area_construida" name="area_construida" value="{{$packEdit->area_locacion}}">
        @error('area_construida')
            <small style="color:red">{{$message}}</small>
          @enderror
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-3">
      <button type="reset" class="btn btn-secondary">Cancelar</button>
    </div>
    <div class="col-md-3">
    <a href="{{route('homeInfraestructura')}}"  class="btn btn-primary">Anterior</a>
    </div>

    <div class="col-md-3">
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>

  </div>
  </form>
</div>

@endsection