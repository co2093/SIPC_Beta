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

    <h2>Lista de Dependencias Jerarquicas</h2>

    <a href="{{ route('dependenciaJerarquica.create') }}" class="btn btn-primary mb-3">Agregar Dependencia Jerarquica</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dependenciasJerarquicas as $recurso)
            <tr>
                <td>{{ $recurso->id_dep_jerar }}</td>
                <td>{{ $recurso->nombre_dep_jerar }}</td>
                <td>{{ $recurso->descrip_dep_jerar }}</td>
                <td>
                    <a href="{{ route('dependenciaJerarquica.edit', $recurso->id_dep_jerar) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('dependenciaJerarquica.destroy', $recurso->id_dep_jerar) }}" method="POST" style="display: inline;">
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