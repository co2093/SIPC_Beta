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
        <li class="breadcrumb-item active" aria-current="page">Reportes</li>
    </ol>
</nav>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Área de reportes de proyectos de investigación</h6>
        </div>
        <div class="card-body">
            <!-- Content Row -->
<div class="row">
    <!-- Tarjeta Proyectos -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="{{ route('archivados.crearreporte') }}" 
                           class="text-xs font-weight-bold text-dark text-uppercase mb-1" 
                           data-toggle="tooltip" 
                           title="Seleccione una opción para generar reportes">
                            Proyectos
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-suitcase fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjeta Colaboradores -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="#" 
                           class="text-xs font-weight-bold text-dark text-uppercase mb-1" 
                           data-toggle="tooltip" 
                           title="Seleccione una opción para generar reportes">
                            Colaboradores
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjeta Financiamientos -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="#" 
                           class="text-xs font-weight-bold text-dark text-uppercase mb-1" 
                           data-toggle="tooltip" 
                           title="Seleccione una opción para generar reportes">
                            Financiamientos
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjeta Convocatorias -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="#" 
                           class="text-xs font-weight-bold text-dark text-uppercase mb-1" 
                           data-toggle="tooltip" 
                           title="Seleccione una opción para generar reportes">
                            Convocatorias
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script de Bootstrap para inicializar los tooltips -->





</div></div>



<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>
@endsection
