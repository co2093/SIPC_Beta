@extends('layouts.default')
@section('content')

@if (session('success'))
    <div style="color: green; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Proyectos antiguos</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark">Proyectos de investigación archivados</h6>
                <!-- Botón "Agregar" alineado al lado derecho de la cabecera -->
                <a class="btn btn-success" href="{{ route('archivados.nuevo') }}">Agregar</a>
            </div>

            <div class="card-body">
                <!-- Formulario de búsqueda y filtros -->
    <form method="GET" action="{{ route('archivados.show') }}" id="filterForm">
        <div class="row mb-3">
            <div class="col-md-3">
                <input type="text" class="form-control" name="search" id="searchInput" placeholder="Buscar..." value="{{ request()->search }}">
            </div>
            <div class="col-md-3">
                <select class="form-control" name="convocatoria">
                    <option value="">Seleccione Convocatoria</option>
                    @foreach ($convocatorias as $convocatoria)
                        <option value="{{ $convocatoria->idconvocatoria }}" {{ request()->convocatoria == $convocatoria->idconvocatoria ? 'selected' : '' }}>
                            {{ $convocatoria->numeroconvocatoria }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-control" name="area">
                    <option value="">Seleccione Área</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->idareaconocimiento }}" {{ request()->area == $area->idareaconocimiento ? 'selected' : '' }}>
                            {{ $area->nombreareaconocimiento }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-control" name="estado">
                    <option value="">Seleccione Estado</option>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->idestadoproyecto }}" {{ request()->estado == $estado->idestadoproyecto ? 'selected' : '' }}>
                            {{ $estado->nombreestadoproyecto }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>


                <table class="table mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Título</th>
                            <th scope="col">Convocatoria</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Área</th>
                            <th scope="col">Tipo</th>
                            <th scope="col" class="fixed-col text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proyectos as $i)
                            <tr>
                                <td>{{ $i->idproyecto }}</td>
                                <td>{{ $i->tituloproyecto }}</td>
                                <td>{{ $i->idconvocatoria }}</td>
                                <td>{{ $i->nombreestadoproyecto }}</td>
                                <td>{{ $i->nombreareaconocimiento }}</td>
                                <td>{{ $i->tipoproyecto }}</td>
                                <td class="fixed-col text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('projects.prueba', $i->idproyecto) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $proyectos->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Selecciona el formulario
    const filterForm = document.getElementById('filterForm');

    // Activa el envío automático del formulario cuando se cambia algún filtro
    filterForm.addEventListener('change', function() {
        filterForm.submit();
    });

    // Activa el envío automático cuando se escribe en el campo de búsqueda
    document.getElementById('searchInput').addEventListener('input', function() {
        filterForm.submit();
    });
</script>
@endsection
