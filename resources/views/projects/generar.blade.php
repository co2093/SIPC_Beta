@extends('layouts.default')

@section('content')
@if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
@endif
@if (session('error'))
        <div style="color: red; margin-bottom: 20px;">
            {{ session('error') }}
        </div>
@endif

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('archivados.reportes') }}">Reportes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Generar reportes</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Proyectos de investigación
                </h6>
            </div>

            <div class="card-body">
                <!-- Search Box -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="searchInput" placeholder="Buscar...">
                    </div>
                    <div class="col-md-6 text-right">
                     
                    <a href="{{ route('archivados.pdf') }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color: #cf302a; color: white;">
                        <i class="fas fa-download fa-sm text-white-50"></i>
                        Reporte PDF
                    </a>


                    <a href="{{ route('archivados.excel') }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color: #217346; color: white;">
                        <i class="fas fa-download fa-sm text-white-50"></i>
                        Reporte Excel
                    </a>

                    </div>
                </div>

                <div class="table-responsive table-wrapper">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col">Área de conocimiento</th>
                                <th scope="col">Investigador</th>
                                <th scope="col">Financiamiento externo</th>
                                <th scope="col">Financiamiento SIC UES</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proyectos as $p)
                                <tr>
                                    <td>{{ $p->tituloproyecto }}</td>
                                    <td>{{ $p->nombreareaconocimiento }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td class="monto">{{ $p->total_financiamiento }}</td>
                                    <td class="monto">{{ $p->presupuesto }}</td>
                                    <td>{{ $p->nombreestadoproyecto }}</td>
                              
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $proyectos->links() }}
                    </div>
                </div>
                <hr class="my-4">
                <div class="alert alert-light" role="alert">
                    <strong>Nota:</strong> Todos los costos están expresados en dólares estadounidenses (USD).
                </div>
                <hr class="my-4">

                <a class="btn btn-secondary float-right" href="{{ route('home') }}">Regresar</a>
            </div>
        </div>
    </div>                    
</div>

@endsection
