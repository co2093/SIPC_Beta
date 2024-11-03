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
        <li class="breadcrumb-item active" aria-current="page">Gráficos</li>
    </ol>
</nav>

<style>
    /* Ajusta el tamaño del gráfico */
    #graficoBarras {
        width: 800px; /* Ancho del gráfico */
        height: 400px; /* Alto del gráfico */
    }
</style>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Área de gráficos de proyectos de investigación</h6>
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
                        <a href="{{ route('archivados.graficosfacultad') }}" 
                           class="text-xs font-weight-bold text-dark text-uppercase mb-1" 
                           data-toggle="tooltip" 
                           title="Seleccione una opción para generar gráficos">
                            Proyectos por facultad
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
                        <a href="{{ route('archivados.graficosinvestigadores') }}" 
                           class="text-xs font-weight-bold text-dark text-uppercase mb-1" 
                           data-toggle="tooltip" 
                           title="Seleccione una opción para generar gráficos">
                            Investigadores asociados
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
                        <a href="{{ route('archivados.graficosfinanciamientos') }}" 
                           class="text-xs font-weight-bold text-dark text-uppercase mb-1" 
                           data-toggle="tooltip" 
                           title="Seleccione una opción para generar gráficos">
                            Financiamientos externos
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
                        <a href="{{ route('archivados.graficos') }}" 
                           class="text-xs font-weight-bold text-dark text-uppercase mb-1" 
                           data-toggle="tooltip" 
                           title="Seleccione una opción para generar gráficos">
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


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Investigadores</h6>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-auto">
                <canvas id="graficoBarras" style="width: 800px; height: 400px;"></canvas>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>


<script>
    // Obtén los datos de la API en Laravel
    fetch('/projects/datos-grafico/investigadores')
        .then(response => response.json())
        .then(datos => {
            // Prepara los datos para el gráfico
            const etiquetas = datos.map(dato => dato.nombrefacultad);
            const hombres = datos.map(dato => dato.total_hombres);
            const mujeres = datos.map(dato => dato.total_mujeres);

            // Configura el gráfico
            const ctx = document.getElementById('graficoBarras').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: etiquetas,
                    datasets: [
                        {
                            label: 'Hombres',
                            data: hombres,
                            backgroundColor: 'rgba(54, 162, 235, 0.6)', // Color para hombres
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Mujeres',
                            data: mujeres,
                            backgroundColor: 'rgba(255, 99, 132, 0.6)', // Color para mujeres
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return `${tooltipItem.dataset.label}: ${tooltipItem.raw}`;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Facultades',
                                font: {
                                    size: 14
                                }
                            }
                        },
                        y: {
                            beginAtZero: true, // Inicia desde 0
                            title: {
                                display: true,
                                text: 'Cantidad de Colaboradores',
                                font: {
                                    size: 14
                                }
                            },
                            ticks: {
                                stepSize: 1, // Muestra solo números enteros
                                callback: function(value) {
                                    return Number.isInteger(value) ? value : null;
                                }
                            }
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error al obtener los datos:', error));
</script>


@endsection
