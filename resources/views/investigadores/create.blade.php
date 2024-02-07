@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<h1 style="text-align: center;">Registro de Docentes e Investigadores</h1>

<form action="/investigadores" method="post" style="margin: 25px;">
  @csrf

  <div class="form-container d-flex flex-column align-items-center">

    <div class="d-flex mb-3 align-items-center w-100">
      <label for="nombres" class="form-label me-3">Nombres</label>
      <input type="text" class="form-control w-50" tabindex="1" id="nombres" name="nombres" placeholder="Nombres">

      <label for="apellidos" class="form-label me-3">Apellidos</label>
      <input type="text" class="form-control w-50" tabindex="2" id="apellidos" name="apellidos" placeholder="Apellidos">
    </div>

    <div class="d-flex mb-3 align-items-center w-100">
      <label for="correo" class="form-label me-3">Email</label>
      <input type="email" class="form-control " tabindex="3" name="correo" id="correo" placeholder="Email">
    </div>
    <div class="d-flex mb-3 align-items-center w-100">
    <label for="genero" class="form-label me-3">Genero</label>
    </div>
    <div class="d-flex mb-3 align-items-center w-100">
      <div class="d-flex form-check w-50">
        <input class="form-check-input me-3" type="radio" name="genero" id="masculino" value="masculino">
        <label class="form-check-label" for="masculino">Masculino</label>
      </div>
      <div class="d-flex form-check w-50">
        <input class="form-check-input me-3" type="radio" name="genero" id="femenino" value="femenino">
        <label class="form-check-label" for="femenino">Femenino</label>
      </div>
    </div>
    <div class="d-flex mb-3 align-items-center w-100">
      <label for="categoria" class="form-label me-3">M&aacute;ximo Grado Acad&eacute;mico</label>
      <select class="form-control w-45" tabindex="6" name="categoria" id="categoria">
        <option selected>Seleccione uno</option>
        <option>1</option>
      </select>

      <label for="carrera" class="form-label ms-3">Carrera seg&uacute;n T&iacute;tulo</label>
      <select class="form-control w-40" tabindex="6" name="carrera" id="carrera">
        <option selected>Seleccione una</option>
        <option>1</option>
      </select>
    </div>

    <div class="d-flex justify-content-between w-100">
      <button type="submit" class="btn btn-success"><i class="bi bi-plus-lg"></i> Registrar</button>
      <a href="/investigadores" class="btn btn-warning"><i class="bi bi-pencil"></i> cancelar</a>
      <a href="/investigadores" class="btn btn-danger"><i class="bi bi-arrow-left"></i> cancelar</a>
    </div>

  </div>
</form>

@endsection