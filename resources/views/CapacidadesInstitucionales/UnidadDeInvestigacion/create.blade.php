@extends('layouts.default')
<!-- Asegúrate de tener un layout definido en resources/views/layouts -->



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

<div class="container-fluid">
  <form action="{{route('unidadesDeInvestigacion.store')}}" method="post" class="unidadesDeInvestigacion-form">
    @csrf
    <div class="form-section">
      <label for="">Nombre de la Unidad:</label>
      <input type="text" class="form-control mb-3" name="nombre_unidad" value="{{ old('nombre_unidad') }}" required>
      <label for="">Direcci&oacute;n de la Unidad</label>
      <input type="text" class="form-control mb-3" name="direccion_unidad" value="{{ old('direccion_unidad') }}"
        required>
    </div>
    <div class="form-section">
      <label for="">Fecha de Fundaci&oacute;n de la Unidad</label>
      <input type="date" class="form-control mb-3" name="fecha_fundacion" value="{{ old('fecha_fundacion') }}" required>

      <label for="">Tel&eacute;fono Institucional</label>
      <input type="tel" class="form-control mb-3 {{ $errors->has('telefono_unidad') ? 'is-invalid' : '' }}"
        name="telefono_unidad" placeholder="Ej. XXXXXXXX" value="{{ old('telefono_unidad') }}" required>
      @if ($errors->has('telefono_unidad'))
      <div class="invalid-feedback">
        {{ $errors->first('telefono_unidad') }}
      </div>
      @endif
    </div>
    <div class="form-section">
      <label for="id_dep_jerar">Dependencia Jer&aacute;rquica de la Unidad</label>
      <select name="id_dep_jerar" class="form-control" required>
        @foreach ($deps_jerarquicas as $deps)
        <option value="{{ $deps->id_dep_jerar }}">{{ $deps->nombre_dep_jerar }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-section">
      <label for="id_unidad_rrff">Unidades de Recursos Financieros</label>
      <select name="id_unidad_rrff" class="form-control" required>
        @foreach ($unidades_rrffs as $unds)
        <option value="{{ $unds->id_unidad_rrff }}">{{ $unds->nombre_unidad_rrff }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-navigation mt-3">
      <button type="button" class="previous btn btn-primary float-left">&lt; Previous</button>
      <button type="button" class="next btn btn-primary float-right">Next &gt;</button>
      <a href="{{ route('unidadesDeInvestigacion.index') }}" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-success float-right">Submit</button>
    </div>

  </form>
</div>

@endsection