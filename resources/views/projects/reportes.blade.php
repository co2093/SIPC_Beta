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
        <div class="row">
            <!-- Tarjeta Proyectos -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="javascript:void(0);" 
                                   onclick="toggleFiltros('filtrosProyectos')" 
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
                                <a href="javascript:void(0);" 
                                   onclick="toggleFiltros('filtrosColaboradores')" 
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

            <!-- Añade más tarjetas aquí según sea necesario -->
        </div>
    </div>
</div>

<!-- Tarjeta de filtros para Proyectos, oculta por defecto -->
<div class="card shadow mb-4" id="filtrosProyectos" style="display: none;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Filtros para reportes de proyectos</h6>
    </div>
    <div class="card-body">
<form method="GET" action="{{ route('archivados.crearreporte') }}">
    <div class="form-row align-items-center">
        <!-- Filtro de Convocatoria -->
        <div class="col-md-3 mb-3">
            <select class="form-control" name="convocatoria">
                <option value="">Todas las convocatorias</option>
                <!-- Opciones de convocatoria aquí -->
                @foreach($convocatorias as $c)
                <option value="{{$c->idconvocatoria}}">{{$c->numeroconvocatoria}}</option>                    
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-3">
            <select class="form-control" name="facultad">
                <option value="">Todas las facultades</option>
                <!-- Opciones de convocatoria aquí -->
                @foreach($facultades as $f)
                <option value="{{$f->idfacultad}}">{{$f->nombrefacultad}}</option>                    
                @endforeach
            </select>
        </div>

        <!-- Filtro de Área de investigación -->
        <div class="col-md-2 mb-3">
            <select class="form-control" name="area">
                <option value="">Todas las áreas</option>
                <!-- Opciones de área aquí -->
                @foreach($areas as $a)
                <option value="{{$a->idareaconocimiento}}">{{$a->nombreareaconocimiento}}</option>
                @endforeach
            </select>
        </div>

        <!-- Filtro de Estado -->
        <div class="col-md-3 mb-3">
            <select class="form-control" name="estado">
                <option value="">Todos los estados</option>
                <!-- Opciones de estado aquí -->
                @foreach($estados as $e)
                <option value="{{$e->idestadoproyecto}}">{{$e->nombreestadoproyecto}}</option>
                @endforeach
            </select>
        </div>

        <!-- Botón de búsqueda -->
        <div class="col-md-1 mb-3">
            <button type="submit" class="btn btn-danger">Buscar</button>
        </div>
    </div>
</form>

    </div>
</div>

<!-- Tarjeta de filtros para Colaboradores, oculta por defecto -->
<div class="card shadow mb-4" id="filtrosColaboradores" style="display: none;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Filtros para reportes de colaboradores</h6>
    </div>
    <div class="card-body">
    <form method="GET" action="{{ route('colaboradores.crearreporte') }}">
            <div class="form-row align-items-center">
        <div class="col-md-3 mb-3">
            <select class="form-control" name="convocatoria">
                <option value="">Todas las convocatorias</option>
                <!-- Opciones de convocatoria aquí -->
                @foreach($convocatorias as $c)
                <option value="{{$c->idconvocatoria}}">{{$c->numeroconvocatoria}}</option>                    
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-3">
            <select class="form-control" name="facultad">
                <option value="">Todas las facultades</option>
                <!-- Opciones de convocatoria aquí -->
                @foreach($facultades as $f)
                <option value="{{$f->idfacultad}}">{{$f->nombrefacultad}}</option>                    
                @endforeach
            </select>
        </div>

        <!-- Filtro de Área de investigación -->
        <div class="col-md-2 mb-3">
            <select class="form-control" name="area">
                <option value="">Todas las áreas</option>
                <!-- Opciones de área aquí -->
                @foreach($areas as $a)
                <option value="{{$a->idareaconocimiento}}">{{$a->nombreareaconocimiento}}</option>
                @endforeach
            </select>
        </div>

        <!-- Filtro de Estado -->
        <div class="col-md-3 mb-3">
            <select class="form-control" name="estado">
                <option value="">Todos los estados</option>
                <!-- Opciones de estado aquí -->
                @foreach($estados as $e)
                <option value="{{$e->idestadoproyecto}}">{{$e->nombreestadoproyecto}}</option>
                @endforeach
            </select>
        </div>
                
        <!-- Botón de búsqueda -->
        <div class="col-md-1 mb-3">
            <button type="submit" class="btn btn-danger">Buscar</button>
        </div>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleFiltros(cardId) {
        const allCards = ['filtrosProyectos', 'filtrosColaboradores'];
        
        // Oculta todas las tarjetas de filtros
        allCards.forEach(id => {
            document.getElementById(id).style.display = 'none';
        });
        
        // Muestra solo la tarjeta seleccionada
        const selectedCard = document.getElementById(cardId);
        if (selectedCard) {
            selectedCard.style.display = 'block';
        }
    }

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>

@endsection
