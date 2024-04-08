@extends('layouts.default')
@section('content')
<div class="card">
  <div class="card-header">Agregar Nuevo Responsable</div>
  <div class="card-body">
    <p class="card-text">
    <form action="{{ route ('responsable.store') }}" method="POST">
      {{-- Token de laravel de Seguridad para la parte de formularios --}}
      @csrf
      <label for="personas">Nombre</label>
      <input type="text" name='nombre_persona' class="form-control" required>

      <label for="">Apellido</label>
      <input type="text" name='apellido_persona' class="form-control" required>

      <br>
      <label for="personas">Grado Academico</label>
      <div class="form-floating">
        <select class="form-select" id="" aria-label="">
          {{-- <input type="text" name='titulo_g_acad' class="form-control" required> --}}
        </select>
        <label for="floatingSelect">Seleccione el Grado Academico</label>
      </div>
      <br>
      <label for="personas">Carrera</label>
      <div class="form-floating">
        <select class="form-select" id="" aria-label="">
          <option selected></option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
        <label for="floatingSelect">Seleccione la Carrera</label>
      </div>
      <br>
      <label for="personas">Cargo</label>
      <div class="form-floating">
        <select class="form-select" id="" aria-label="">
          <option selected></option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
        <label for="floatingSelect">Seleccione el Cargo</label>
      </div>
      <br>
      <label for="">Telefono</label>
      <input type="text" name='telefono_persona' class="form-control" required>
      <label for="">Correo</label>
      <input type="text" name='correo_persona' class="form-control" required>

      <label for="">Responsable</label>
      <div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"></div>
      <a href="{{ route("responsable.index")}}" class="btn btn-info" data-bs-dismiss="modal">
        <span class="fas fa-undo-alt"></span> Regresar
      </a>
      <button type="submit" class="btn btn-primary">
        <span class="fas fa-user-plus"></span> Agregar
      </button>
    </form>
    </p>
  </div>
</div>

@endsection