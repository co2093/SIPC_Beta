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
  <form action="{{route('setInfraestructura')}}" method="POST">
    @csrf
    <div class="form-group">
      <div class="row">
        <div class="col-md-9">
          <h1>Infraestructuras/Proyecto</h1>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-9">
          <select class="custom-select" id="tipo_infraestructura" name="tipo_infraestructura" data-oldinfra="{{old('tipo_infraestructura')}}">
            <option value="" selected>Seleccione un tipo de infraestructura</option>
            @foreach($infraestructuras as $infraestructura)
            <option value="{{$infraestructura->id_t_infra}}">{{$infraestructura->nombre_t_infra}}</option>
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
          <select class="custom-select" id="proyecto" name="proyecto" data-oldproject="{{old('proyecto')}}">
            <option value="" selected>Seleccione un tipo de proyecto asociado</option>
            @foreach($proyectosArray as $project)
            <option value="{{$project->id_proyecto}}">{{$project->nombre_proyecto}}</option>
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
          <input type="number" class="form-control" id="area_construida" name="area_construida" value="{{old('area_construida')}}">
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
        <button type="button" class="btn btn-primary">Anterior</button>
      </div>

      <div class="col-md-3">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>

    </div>
  </form>
  <br>
  <div class="row">
    <div class="col-md-10">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th>ID</th>
            <th>infraestructura</th>
            <th>Proyecto</th>
            <th>Area construida</th>
            <th>acciones</th>
          </tr>
        </thead>
        <tbody>

          @foreach($coleccion_locacion as $infraestructura)
          <tr>
            <td>{{$infraestructura->id_locacion}}</td>
            @foreach($infraestructuras as $infraestructurarow)
            @if($infraestructura->id_t_infra==$infraestructurarow->id_t_infra)
            <td>{{$infraestructurarow->nombre_t_infra}}</td>
            @endif
            @endforeach
            <td>{{$infraestructura->id_proyecto}}</td>
            <td>{{$infraestructura->area_locacion}}</td>
            <td> <a href="{{route('deleteLocacion',$infraestructura->id_locacion)}}" class="btn btn-danger"><span class="fas fa-trash-alt"> </a></span> <a href="{{route('editInfraestructura',$infraestructura->id_locacion)}}" class="btn btn-success"><span class="fas fa-pen"></a></span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection