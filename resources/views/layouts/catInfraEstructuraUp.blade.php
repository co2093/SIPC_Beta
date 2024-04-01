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
    <form action="{{route('upCatInfraestructura',$packEdit->id_t_infra)}}" method="POST">
      @csrf
      @method("PUT")
  <div class="form-group">
    <div class="row">
      <div class="col-md-9">
        <h5>Modifiar infraestructura</h5>
      </div> 
    </div>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-md-9">
      <label for="area_construida">Nombre infraestructura</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="{{$packEdit->nombre_t_infra}}">
      @error('nombre')
        <small style="color:red">{{$message}}</small>
      @enderror  
    </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-md-9">
        <label for="area_construida">Descripcion</label>
        <textarea type="text" class="form-control" id="descripcion" name="descripcion" value="">{{$packEdit->descrip_t_infra}}</textarea>
        @error('descripcion')
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
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>

  </div>
  </form>
  <br>
</div>

@endsection