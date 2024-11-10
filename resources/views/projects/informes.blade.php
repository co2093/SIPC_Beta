@extends('layouts.default')
@section('content')

@if (session('success'))
    <div style="color: green; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('archivados.show') }}">Proyectos antiguos</a></li>
                <li class="breadcrumb-item"><a href="{{ route('projects.prueba', $cod) }}">Registro</a></li>

        <li class="breadcrumb-item active" aria-current="page">Informes</li>

    </ol>
</nav>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark">Documentación de proyectos de investigación archivados</h6>
                <!-- Botón "Agregar" alineado al lado derecho de la cabecera -->
                <a class="btn btn-success" href="{{ route('archivados.informesindex', $cod) }}">Agregar</a>
            </div>
           
                    <div class="card-body">

                        <!-- Search Box -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="searchInput" placeholder="Buscar...">
                            </div>
                        </div>
                        <div class="table-responsive table-wrapper">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Archivo</th>
                                    
                                     <th scope="col" class="fixed-col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($documentos as $d)
                            <tr>
                                <td>{{ $d->nombredocumento }}</td>
                                <td>{{ $d->documento }}</td>
                                <td class="fixed-col">
                                    <!-- Enlace de descarga -->
                                <a class="btn btn-primary btn-sm" href="{{ asset('storage/attachments/' . basename($d->documento)) }}" download>
                                    <i class="fas fa-download"></i>
                                </a>


                                     
<form action="{{ route('archivados.destroydoc', $d->iddocumento) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este archivo?');" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>

                        </table>
                        </div>

                        <hr class="my-4">

                      <a  class="btn btn-secondary float-right" href="{{route('projects.prueba', $cod)}}">Regresar</a>

                    </div>
        </div>
    </div>
</div>


@endsection
