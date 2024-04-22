<!-- resources/views/nombre-del-recurso/index.blade.php -->

@extends('layouts.default') <!-- Asegúrate de tener un layout definido en resources/views/layouts -->

@section('content')

    @if($errors->any())
    <div>
        <strong>Algo fue mal</strong> algo ... <br>
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

    <h2>Lista de Unidades de Investigaciones</h2>

    <a href="{{ route('unidadesDeInvestigacion.create') }}" class="btn btn-primary mb-3">Agregar Unidad de Investigaci&oacute;n</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Direcci&oacute;n</th>
                <th>Fecha de Fundaci&oacute;n</th>
                <th>Tel&eacute;fono Institucional</th>
                <th>Unidad RRFF</th>
                <th>Dependencia Jer&aacute;rquica</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unidadesDeInvestigacion as $recurso)
            <tr>
                <td>{{ $recurso->id_unidad }}</td>
                <td>{{ $recurso->nombre_unidad }}</td>
                <td>{{ $recurso->direccion_unidad }}</td>
                <td>{{ $recurso->fecha_fundacion }}</td>
                <td>{{ $recurso->telefono_unidad }}</td>
                <td>{{ $recurso->unidadesRRFF->nombre_unidad_rrff}}</td>
                <td>{{ $recurso->dependenciaJerarquica->nombre_dep_jerar}}</td>
                <td>
                    <a href="{{ route('unidadesDeInvestigacion.edit', $recurso->id_unidad) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('unidadesDeInvestigacion.destroy', $recurso->id_unidad) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este recurso?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection