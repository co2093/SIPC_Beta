@extends('layouts.default')
@section('content')
@if($errors->any())
<div>
  <strong>Algo </strong> salio mal ... <br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>

</div>
@endif
@if (Session::get('success'))
<div class="alert alert-success mt-2">
  <strong>{{ Session::get('success') }}</strong>

</div>
@endif
<div class="card">
  <div class="card-header">Agregar Nuevo Responsable</div>
  <div class="card-body">
    <p class="card-text">
      <a href="{{ route("responsable.buscar", ['id_unidad' => $id_unidad]) }}" class="btn btn-primary">
        <span class="fas fa-user-plus"></span> Seleccionar Responsable
      </a>
    <form action="{{ route ('responsable.store') }}" method="POST">
      {{-- Token de laravel de Seguridad para la parte de formularios --}}
      @csrf
      <input type="hidden" name="id_unidad" value="{{ $id_unidad }}">
      @if (isset($persona))
      <input type="hidden" name="id_persona" value="{{ $persona->id_persona }}">

      <div class="form-section">
        <label for="personas">Nombre</label>
        <input type="text" name='nombre_persona' value="{{ $persona->nombre_persona }}" class="form-control" readonly
          required>
        <label for="">Apellido</label>
        <input type="text" name='apellido_persona' value="{{ $persona->apellido_persona }}" class="form-control"
          readonly required>
      </div>
      <br>
      <div class="form-section">
        <label for="personas">Correo</label>
        <input type="text" name='nombre_persona' value="{{ $persona->correo_persona }}" class="form-control" readonly
          required>

        <label for="">Telefono</label>
        <input type="text" name='apellido_persona' value="{{ $persona->telefono_persona }}" class="form-control"
          readonly required>
      </div>
      @endif
      <br>
      <div class="form-section">
        <label for="id_g_acad">Grado Academico</label>
        <select name="id_g_acad" class="form-control" required>
          @foreach ($grados_academicos as $grads)
          <option value="{{ $grads->id_g_acad }}">{{ $grads->titulo_g_acad }}</option>
          @endforeach
        </select>
      </div>
      <br>
      <div class="form-section">
        <label for="id_carrera">Carrera</label>
        <select name="id_carrera" class="form-control" required>
          @foreach ($carreras as $carr)
          <option value="{{ $carr->id_carrera }}">{{ $carr->nombre_carrera }}</option>
          @endforeach
        </select>
      </div>
      <br>
      <div class="form-section">
        <label for="id_cargo">Cargo</label>
        <select name="id_cargo" class="form-control" required>
          @foreach ($cargos as $carg)
          <option value="{{ $carg->id_cargo }}">{{ $carg->nombre_cargo }}</option>
          @endforeach
        </select>
      </div>
      <br>
      <!-- <div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"></div>-->
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