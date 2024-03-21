@extends('layouts.default')

@section('content')

@if($errors->any())
<div>
    <strong>Algo salió mal:</strong><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success mt-2">
    <strong>{{ Session::get('success') }}</strong>
</div>
@endif
<div class="container-fluid">
    <form action="{{ route('unidadesDeInvestigacion.update', ['unidadesDeInvestigacion' => $unidad->id_unidad]) }}" method="post" class="unidadesDeInvestigacion-form">
        @csrf
        @method('PUT')

        <div class="form-section">
            <label for="nombre_unidad">Nombre de la Unidad:</label>
            <input type="text" class="form-control mb-3" name="nombre_unidad" value="{{ $unidad->nombre_unidad }}" required>
            
            <label for="direccion_unidad">Dirección:</label>
            <input type="text" class="form-control mb-3" name="direccion_unidad" value="{{ $unidad->direccion_unidad }}" required>
        </div>

        <div class="form-section">
            <label for="fecha_fundacion">Fecha Fundación:</label>
            <input type="date" class="form-control mb-3" name="fecha_fundacion" value="{{ $unidad->fecha_fundacion }}" required>
            
            <label for="telefono_unidad">Teléfono:</label>
            <input type="tel" class="form-control mb-3" name="telefono_unidad" value="{{ $unidad->telefono_unidad }}" required>
        </div>

        <div class="form-section">
            <label for="id_dep_jerar">Dependencia Jerarquica:</label>
            <select name="id_dep_jerar" class="form-control" required>
                @foreach ($deps_jerarquicas as $dep)
                    <option value="{{ $dep->id_dep_jerar }}" @if($dep->id_dep_jerar === $unidad->id_dep_jerar ) selected @endif>{{ $dep->nombre_dep_jerar }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-section">
            <label for="id_unidad_rrff">Unidades RRFF</label>
            <select name="id_unidad_rrff" class="form-control" required>
                @foreach ($unidades_rrffs as $unds)
                    <option value="{{ $unds->id_unidad_rrff }}" @if($unds->id_unidad_rrff === $unidad->id_unidad_rrff ) selected @endif>{{ $unds->nombre_unidad_rrff }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-navigation mt-3">
            <button type="button" class="previous btn btn-primary float-left">&lt; Previous</button>
            <button type="button" class="next btn btn-primary float-right">Next &gt;</button>
            <a href="{{ route('unidadesDeInvestigacion.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success float-right">Modificar</button>
        </div>
    </form>
</div>
@endsection
