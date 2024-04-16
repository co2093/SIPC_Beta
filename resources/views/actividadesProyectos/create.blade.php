@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<h1 style="text-align: center;">Registro de Proyectos</h1>

<form action="/actividadesProyectos" method="post" style="margin: 25px;">
  @csrf
  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <label for="nombre_proyecto" class="form-label me-3 mr-4">Nombre del proyecto
        </label>
        <span class="mr-4" data-bs-toggle="tooltip" title="Debe ingresar el nombre del proyecto">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="text" class="form-control ml-3 @error('nombre_proyecto') is-invalid @enderror" tabindex="1" id="nombre_proyecto" name="nombre_proyecto" placeholder="{{ $errors->has('nombre_proyecto') ? $errors->first('nombre_proyecto') : 'Ingrese el nombre del proyecto' }}" value="{{ old('nombre_proyecto') }}">
        <label for="descripcion_proyecto" class="form-label me-3 ml-3 mr-4">Descripci&oacute;n del proyecto
        </label>
        <span class="mr-2" data-bs-toggle="tooltip" title="Debe ingresar el nombre del proyecto">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="text" class="form-control  @error('descripcion_proyecto') is-invalid @enderror" tabindex="1" id="descripcion_proyecto" name="descripcion_proyecto" placeholder="{{ $errors->has('descripcion_proyecto') ? $errors->first('descripcion_proyecto') : 'Ingrese el nombre del proyecto' }}" value="{{ old('descripcion_proyecto') }}">
      </div>
    </div>
  </div>
  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <label for="codigo_proyecto_sicues" class="form-label me-3 mr-3">C&oacute;digo de Proyecto (SIC-UES)
        </label>
        <span class="mr-4" data-bs-toggle="tooltip" title="Debe ingresar el codigo del proyecto (SIC-UES)">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="text" class="form-control ml-3 @error('codigo_proyecto_sicues') is-invalid @enderror" tabindex="1" id="codigo_proyecto_sicues" name="codigo_proyecto_sicues" placeholder="{{ $errors->has('codigo_proyecto_sicues') ? $errors->first('codigo_proyecto_sicues') : 'Ingrese el codigo del proyecto (SIC-UES)' }}" value="{{ old('codigo_proyecto_sicues') }}">
        <label for="codigo_proyecto_facultad" class="form-label me-3 ml-3 mr-4">C&oacute;digo de Proyecto (Facultad)
        </label>
        <span class="mr-2" data-bs-toggle="tooltip" title="Debe ingresar el codigo del proyecto (Facultad)">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="text" class="form-control  @error('codigo_proyecto_facultad') is-invalid @enderror" tabindex="1" id="codigo_proyecto_facultad" name="codigo_proyecto_facultad" placeholder="{{ $errors->has('codigo_proyecto_facultad') ? $errors->first('codigo_proyecto_facultad') : 'Ingrese el codigo del proyecto (Facultad)' }}" value="{{ old('codigo_proyecto_facultad') }}">
      </div>
    </div>
  </div>
  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <label for="id_l_de_invest" class="form-label me-3 ">L&iacute;nea de Investigaci&oacute;n
        </label>
        <span class="ml-3" data-bs-toggle="tooltip" title="Debe seleccionar una linea de investigacion">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <select class="form-control  ml-4 @error('id_l_de_invest') is-invalid @enderror" tabindex="4" name="id_l_de_invest" id="id_l_de_invest">
          <option selected>Seleccione una L&iacute;nea</option>
          @foreach ( $lineas as $linea)
          <option value="{{$linea->id_l_de_invest}}">{{$linea->nombre_l_invest}}</option>
          @endforeach
        </select>
        <label for="id_area_conocimiento" class="form-label me-3 ml-3">&Aacute;rea de Conocimiento</label>
        <span class="ml-2" data-bs-toggle="tooltip" title="Debe seleccionar un area">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <select class="form-control  ml-3 @error('id_area_conocimiento') is-invalid @enderror" tabindex="5" name="id_area_conocimiento" id="id_area_conocimiento">
          <option selected>Seleccione un &Aacute;rea</option>
          @foreach ($areas as $area)
          <option value="{{$area->id_area_conocimiento}}">{{$area->nombre_area_conocimiento}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <label for="id_invest" class="form-label me-3 ">Nombre del Investigador
        </label>
        <span class="ml-4" data-bs-toggle="tooltip" title="Debe seleccionar una linea de investigacion">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <select class="form-control ml-4 @error('id_invest') is-invalid @enderror" tabindex="6" name="id_invest" id="id_invest">
          <option selected>Seleccione un Investigador</option>
          @foreach ($investigadores as $investigador)
          <option value="{{$investigador->id_invest}}">{{$investigador->personasInvestigadores->nombre_persona}}
            {{$investigador->personasInvestigadores->apellido_persona}}
          </option>
          @endforeach
        </select>
        <label for="id_facultad" class="form-label me-3 ml-3">Facultad a la que pertenece</label>
        <span class="ml-2" data-bs-toggle="tooltip" title="Debe seleccionar un area">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <select class="form-control  ml-5 @error('id_facultad') is-invalid @enderror" tabindex="5" name="id_facultad" id="id_facultad">
          <option selected>Seleccione una Facultad</option>
          @foreach ($facultades as $facultad)
          <option value="{{$facultad->id_facultad}}">{{$facultad->nombre_facultad}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <label for="fecha_inicio_proyecto" class="form-label me-3 w-25">Fecha de Inicio del Proyecto
        </label>
        <span class="ml-2" data-bs-toggle="tooltip" title="Debe seleccionar una fecha de inicio">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="date" name="fecha_inicio_proyecto" id="fecha_inicio_proyecto" class="form-control ml-3 w-75 @error('fecha_inicio_proyecto') is-invalid @enderror">
        @error('fecha_inicio_proyecto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror <label for="id_facultad" class="form-label me-3 ml-3 w-25">Fecha de Finalizaci&oacute;n del proyecto</label>
        <span class="ml-2" data-bs-toggle="tooltip" title="Debe seleccionar una fecha de cierre">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="date" name="fecha_fin_proyecto" id="fecha_fin_proyecto" class="form-control ml-3 w-75 @error('fecha_fin_proyecto') is-invalid @enderror">
        @error('fecha_fin_proyecto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>
  </div>
  <div>
    <h5 style="text-align: center; margin-bottom: 20px;">Datos del Objetivo del Proyecto</h5>
  </div>
  <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
    <label for="titulo_objetivo" class="form-label me-3">T&iacute;tulo del Objetivo</label>
    <span data-bs-toggle="tooltip" title="Debe ingresar el titulo del objetivo del proyecto">
      <i class="bi bi-info-circle text-info"></i>
    </span>
    <input type="text" class="form-control  @error('titulo_objetivo') is-invalid @enderror" tabindex="1" id="titulo_objetivo" name="titulo_objetivo" placeholder="{{ $errors->has('titulo_objetivo') ? $errors->first('titulo_objetivo') : 'Ingrese el titulo del objetivo' }}" value="{{ old('titulo_objetivo') }}">
  </div>
  <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
    <label for="descripicion_objetivo" class="form-label me-3">Descripci&oacute;n Objetivo</label>
    <span data-bs-toggle="tooltip" title="Debe ingresar la descripcion del objetivo del proyecto">
      <i class="bi bi-info-circle text-info"></i>
    </span>
    <input type="text" class="form-control @error('descripicion_objetivo') is-invalid @enderror" tabindex="1" id="descripicion_objetivo" name="descripicion_objetivo" placeholder="{{ $errors->has('descripicion_objetivo') ? $errors->first('descripicion_objetivo') : 'Ingrese la descripcion del objetivo' }}" value="{{ old('titulo_objetivo') }}">
  </div>
  <div class="d-flex justify-content-between mb-2">
    <button type="submit" class="btn btn-success"><i class="bi bi-plus-lg"></i> Registrar</button>
    <a href="/actividadesProyectos" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Cancelar</a>
  </div>
</form>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>