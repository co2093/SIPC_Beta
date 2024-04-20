@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<h1 style="text-align: center;">Registro de Actividades</h1>
<form action="/actividadesIMasD/{{$actividadIMasD->id_actividad}}" method="post" style="margin: 25px;">
  @method('PUT')
  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <label for="nombre_actividad" class="form-label me-3 mr-4">Nombre de la Actividad
        </label>
        <span class="mr-4" data-bs-toggle="tooltip" title="Debe ingresar el nombre de la actividad">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="text" class="form-control ml-3 @error('nombre_actividad') is-invalid @enderror" tabindex="1" id="nombre_actividad" name="nombre_actividad" placeholder="{{ $errors->has('nombre_actividad') ? $errors->first('nombre_actividad') : 'Ingrese el nombre de la actividad' }}" value="{{$actividadIMasD->nombre_actividad}}">
        <label for="descripcion_actividad" class="form-label me-3 ml-3 mr-4">Descripci&oacute;n de la Actividad
        </label>
        <span class="mr-2" data-bs-toggle="tooltip" title="Debe ingresar la descripcion de la actividad">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="text" class="form-control  @error('descripcion_actividad') is-invalid @enderror" tabindex="1" id="descripcion_actividad" name="descripcion_actividad" placeholder="{{ $errors->has('descripcion_actividad') ? $errors->first('descripcion_actividad') : 'Ingrese la descripcion de la actividad' }}" value="{{$actividadIMasD->descripcion_actividad}}">
      </div>
    </div>
  </div>
  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <label for="id_proyecto" class="form-label me-3 ">Proyecto Asociado
        </label>
        <span class="ml-2" data-bs-toggle="tooltip" title="Debe seleccionar un proyecto de investigacion">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <select class="form-control  ml-2 @error('id_proyecto') is-invalid @enderror" tabindex="4" name="id_proyecto" id="id_proyecto">
          <option selected>Seleccione un Proyecto</option>
          @foreach ( $proyectos as $proyecto)
          <option value="{{$proyecto->id_proyecto}}">{{$proyecto->nombre_proyecto}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <label for="fecha_inicio_actividad" class="form-label me-3 w-25">Inicio de la Actividad</label>
        <span class="mr-2" data-bs-toggle="tooltip" title="Debe ingresar una fecha de inicio">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="date" name="fecha_inicio_actividad" id="fecha_inicio_actividad" class="form-control ml-3 w-75 @error('fecha_inicio_actividad') is-invalid @enderror">
        @error('fecha_inicio_actividad')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="fecha_fin_actividad" class="form-label me-3 ml-3 w-25">Fin de la Actividad</label>
        <span class="mr-2" data-bs-toggle="tooltip" title="Debe ingresar una fecha de finalizacion">
        <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="date" name="fecha_fin_actividad" id="fecha_fin_actividad" class="form-control ml-3 w-75 @error('fecha_fin_actividad') is-invalid @enderror">
        @error('fecha_fin_actividad')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>
  </div>
  <div>
  <div class="d-flex justify-content-between mb-2">
    <button type="submit" class="btn btn-success"><i class="bi bi-plus-lg"></i> Registrar</button>
    <a href="/actividadesIMasD" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Cancelar</a>
  </div>
</form>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>