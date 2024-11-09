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
        <li class="breadcrumb-item active" aria-current="page">Inventario</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Gestión de inventario
                    <a class="btn btn-success float-right" href="{{ route('inventario.crear') }}">Agregar</a>
                </h6>
            </div>

            <div class="card-body">
                <!-- Search Box -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="searchInput" placeholder="Buscar...">
                    </div>
                    <div class="col-md-6 text-right">
                     
                    <a href="{{ route('inventario.pdf') }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color: #cf302a; color: white;">
                        <i class="fas fa-download fa-sm text-white-50"></i>
                        Reporte PDF
                    </a>


                    <a href="{{ route('inventario.excel') }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color: #217346; color: white;">
                        <i class="fas fa-download fa-sm text-white-50"></i>
                        Reporte Excel
                    </a>

                    </div>
                </div>

                <div class="table-responsive table-wrapper">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Serie</th>
                                <th scope="col">Proyecto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Facultad</th>
                                <th scope="col">Condición</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Costo unitario</th>
                                <th scope="col">Total</th>
                                <th scope="col" class="fixed-col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventario as $i)
                                <tr>
                                    <td>{{ $i->serie }}</td>
                                    <td>{{ $i->idproyecto }}</td>
                                    <td>{{ $i->descripcionbien }}</td>
                                    <td>{{ $i->facultad }}</td>
                                    <td>{{ $i->condicion }}</td>
                                    <td>{{ $i->cantidad }}</td>
                                    <td class="monto">{{$i->valor}}</td>
                                    <td class="monto">{{$i->valor * $i->cantidad}}</td>
                                    <td class="fixed-col"> 
                                        <a class="btn btn-info btn-sm" href="{{ route('inventario.details', $i->codinventario) }}"><i class="fas fa-eye"></i></a>  
                                        <a class="btn btn-primary btn-sm" href="{{ route('inventario.edit', $i->codinventario) }}"><i class="fas fa-edit"></i></a>                                        
                                        <a class="btn btn-danger btn-sm" href="{{ route('inventario.confirm', $i->codinventario) }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $inventario->links() }}
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
