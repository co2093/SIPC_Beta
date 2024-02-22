@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<h1 style="text-align: center;">Registro de Investigadores</h1>

<form action="/investigadores" method="post" style="margin: 25px;">
  @csrf
  <div class="form-container d-flex flex-column ">
    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Nombres</label>
      <input type="text" class="form-control w-75" tabindex="1" 
      id="nombre_persona" name="nombre_persona" placeholder="Nombres">
    </div>

    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Apellidos</label>
      <input type="text" class="form-control w-75" tabindex="2" id="apellido_persona" 
      name="apellido_persona" placeholder="Apellidos">
    </div>

    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Correo Electr&oacute;nico</label>
      <input type="email" class="form-control w-75" tabindex="3" name="correo_persona"
       id="correo_persona" placeholder="Ingrese el Correo Eletronico del Investigador">
    </div>
    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Tel&eacute;fono</label>
      <input type="text" class="form-control w-75" tabindex="3" name="telefono_persona" 
      id="teleforno_persona" placeholder="Ingrese el telefono del Investigador">
    </div>
    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Direcci&oacute;</label>
      <input type="text" class="form-control w-75" tabindex="3" name="direccion_persona"
       id="direccion_persona" placeholder="Ingrese lugar de residencia del Investigador">
    </div>
    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Pais</label>
      <select class="form-control w-75" tabindex="4" name="id_pais" id="id_pais">
        <option selected>Seleccione Pais</option>
        @foreach ( $paises as $pais)
        <option value="{{$pais->id_pais}}">{{$pais->nombre_pais}}</option>
        @endforeach
      </select>
    </div>
    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
  <label for="genero_persona" class="form-label me-3" style="margin-right: 10px;">G&eacute;nero</label>
  <div class="form-check">
    <input class="form-check-input me-3" type="radio" name="genero_persona" id="genero_masculino" value="true">
    <label class="form-check-label" for="genero_masculino" style="margin-right: 10px;">Masculino</label>
  </div>
  <div class="form-check">
    <input class="form-check-input me-3" type="radio" name="genero_persona" id="genero_femenino" value="false">
    <label class="form-check-label" for="genero_femenino">Femenino</label>
  </div>
</div>


    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">M&aacute;ximo Grado Acad&eacute;mico</label>
      <select class="form-control w-75" tabindex="4" name="id_g_acad" id="id_g_acad">
        <option selected>Grado Acad&eacute;mico</option>
        @foreach ( $grados_academicos as $grado_academico)
        <option value="{{$grado_academico->id_g_acad}}">{{$grado_academico->titulo_g_acad}}</option>
        @endforeach
      </select>
    </div>

    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Carrera seg&uacute;n T&iacute;tulo</label>
      <select class="form-control w-75" tabindex="5" name="id_carrera" id="id_carrera">
        <option selected>Seleccione una</option>
        @foreach ($carreras as $carrera)
        <option value="{{$carrera->id_carrera}}">{{$carrera->nombre_carrera}}</option>
        @endforeach
      </select>
    </div>
    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Unidad a la que pertenece</label>
      <select class="form-control w-75" tabindex="5" name="id_unidad" id="id_unidad">
        <option selected>Seleccione una</option>
        @foreach ($unidades as $unidad)
        <option value="{{$unidad->id_unidad}}">{{$unidad->nombre_unidad}}</option>
        @endforeach
      </select>
    </div>
    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Unidad de RRHH</label>
      <select class="form-control w-75" tabindex="5" name="id_unidad_rrhh" id="id_unidad_rrhh">
        <option selected>Seleccione una</option>
        @foreach ($rrhh as $rh)
        <option value="{{$rh->id_unidad_rrhh}}">{{$rh->nombre_unidad_rrhh}}</option>
        @endforeach
      </select>
    </div>
    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Capacitaciones</label>
      <select class="form-control w-75" tabindex="5" name="id_cap" id="id_cap">
        <option selected>Seleccione una</option>
        @foreach ($capacitaciones as $capacitacion)
        <option value="{{$capacitacion->id_cap}}">{{$capacitacion->nombre_capacitacion}}</option>
        @endforeach
      </select>
    </div>
    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Acr&oacute;nimo</label>
      <input type="text" class="form-control w-75" tabindex="6" id="acronimo" name="acronimo" placeholder="Acronimo">
    </div>

    <div class="d-flex justify-content-between mb-2">
      <button type="submit" class="btn btn-success"><i class="bi bi-plus-lg"></i> Registrar</button>
      <a href="/investigadores" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Cancelar</a>
    </div>
  </div>
</form>

@endsection