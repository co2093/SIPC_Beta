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
      <label for="genero" class="form-label me-3" style="margin-right: 10px;">G&eacute;nero</label>
      <div class="form-check">
        <input class="form-check-input me-3" type="radio" name="genero" id="genero" value="masculino">
        <label class="form-check-label" for="" style="margin-right: 10px;">Masculino</label>
      </div>
      <div class="form-check">
        <input class="form-check-input me-3" type="radio" name="genero" id="genero" value="femenino">
        <label class="form-check-label" for="">Femenino</label>
      </div>
    </div>

    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">M&aacute;ximo Grado Acad&eacute;mico</label>
      <select class="form-control w-75" tabindex="4" name="titulo_g_acad" id="titulo_g_acad">
        <option selected>Grado Acad&eacute;mico</option>
        @foreach ( $grados_academicos as $grado_academico)
        <option value="{{$grado_academico->id_g_acad}}">{{$grado_academico->titulo_g_acad}}</option>
        @endforeach
      </select>
    </div>

    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Carrera seg&uacute;n T&iacute;tulo</label>
      <select class="form-control w-75" tabindex="5" name="carrera" id="carrera">
        <option selected>Seleccione una</option>
        @foreach ($carreras as $carrera)
        <option value="{{$carrera->id_carrera}}">{{$carrera->nombre_carrera}}</option>
        @endforeach
      </select>
    </div>
    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Unidad a la que pertenece</label>
      <select class="form-control w-75" tabindex="5" name="unidad" id="unidad">
        <option selected>Seleccione una</option>
        @foreach ($unidades as $unidad)
        <option value="{{$unidad->id_unidad}}">{{$unidad->nombre_unidad}}</option>
        @endforeach
      </select>
    </div>
    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="" class="form-label me-3" style="margin-right: 10px;">Unidad de RRHH</label>
      <select class="form-control w-75" tabindex="5" name="rh" id="rh">
        <option selected>Seleccione una</option>
        @foreach ($rrhh as $rh)
        <option value="{{$rh->id_unidad_rrhh}}">{{$rh->nombre_unidad_rrhh}}</option>
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