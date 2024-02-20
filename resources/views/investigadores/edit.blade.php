@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<div style="text-align: center;">
<h1>Registro de Investigadores</h1>
<h3>Actualizaci&oacute;n de datos</h3>
</div>

<form action="/investigadores" method="post" style="margin: 25px;">
  @csrf

  <div class="form-container d-flex flex-column ">
    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="nombres" class="form-label me-3" style="margin-right: 10px;">Nombres</label>
      <input type="text" class="form-control w-75" tabindex="1" id="nombres" name="nombres" placeholder="Nombres">
    </div>

    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="apellidos" class="form-label me-3" style="margin-right: 10px;">Apellidos</label>
      <input type="text" class="form-control w-75" tabindex="2" id="apellidos" name="apellidos" placeholder="Apellidos">
    </div>

    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="correo" class="form-label me-3" style="margin-right: 10px;">Correo Electr&oacute;nico</label>
      <input type="email" class="form-control w-75" tabindex="3" name="correo" id="correo" placeholder="Ingrese el Correo Eletronico del Investigador o Docente">
    </div>

    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="genero" class="form-label me-3" style="margin-right: 10px;">G&eacute;nero</label>
      <div class="form-check">
        <input class="form-check-input me-3" type="radio" name="genero" id="masculino" value="masculino">
        <label class="form-check-label" for="masculino" style="margin-right: 10px;">Masculino</label>
      </div>
      <div class="form-check">
        <input class="form-check-input me-3" type="radio" name="genero" id="femenino" value="femenino">
        <label class="form-check-label" for="femenino">Femenino</label>
      </div>
    </div>

    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="gradoacademico" class="form-label me-3" style="margin-right: 10px;">M&aacute;ximo Grado Acad&eacute;mico</label>
      <select class="form-control w-75" tabindex="4" name="gradoacademico" id="gradoacademico">
        <option selected>Grado Acad&eacute;mico</option>
        <option>1</option>
      </select>
    </div>

    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="carrera" class="form-label me-3" style="margin-right: 10px;">Carrera seg&uacute;n T&iacute;tulo</label>
      <select class="form-control w-75" tabindex="5" name="carrera" id="carrera">
        <option selected>Seleccione una</option>
        <option>1</option>
      </select>
    </div>
    
    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
      <label for="acronimo" class="form-label me-3" style="margin-right: 10px;">Acr&oacute;nimo Carrera</label>
      <input type="text" class="form-control w-75" tabindex="6" id="acronimo" name="acronimo" placeholder="Acronimo">
    </div>

    <div class="d-flex justify-content-between mb-2">
      <a href="/investigadores" class="btn btn-warning"><i class="bi bi-pencil"></i> Actualizar</a>
      <a href="/investigadores" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Cancelar</a>
    </div>
  </div>
</form>

@endsection
