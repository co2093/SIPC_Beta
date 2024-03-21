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
    <form action="{{route('saveCatInfra')}}" method="POST">
      @csrf
  <div class="form-group">
    <div class="row">
      <div class="col-md-9">
        <h1>Catalogo de infraestructuras</h1>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-md-9">
      <label for="area_construida">Nombre infraestructura</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-md-9">
        <label for="area_construida">Descripcion</label>
        <textarea type="text" class="form-control" id="descripcion" name="descripcion"></textarea>
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
  <div class="row">
    <div class="col-md-10">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th>ID</th>
            <th>infraestructura</th>
            <th>Descripcion</th>
            <th>acciones</th>
          </tr>
        </thead>
        <tbody>

          @foreach($infraArray as $infraestructura)
            <tr>
              <td>{{$infraestructura->id_t_infra}}</td>
              <td>{{$infraestructura->nombre_t_infra}}</td>
              <td>{{$infraestructura->descrip_t_infra}}</td>
              <td><a href="{{route('delCatInfraestructura',$infraestructura->id_t_infra)}}" class="btn btn-danger"><span class="fas fa-trash-alt"></span>  </a> <a href="{{route('editCatInfraestructura',$infraestructura->id_t_infra)}}" class="btn btn-success"><span class="fas fa-pen"></a></span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection