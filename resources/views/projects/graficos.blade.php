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
                        <a href="{{ route('archivados.crearreporte') }}" 
                           class="text-xs font-weight-bold text-dark text-uppercase mb-1" 
                           data-toggle="tooltip" 
                           title="Seleccione una opción para generar gráficos">
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
                           title="Seleccione una opción para generar gráficos">
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
                           title="Seleccione una opción para generar gráficos">
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
        <h6 class="m-0 font-weight-bold text-dark">Últimas convocatorias</h6>
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
        fetch('/projects/datos-grafico')
            .then(response => response.json())
            .then(datos => {
                // Prepara los datos para el gráfico
                const etiquetas = datos.map(dato => dato.numeroconvocatoria);
                const valores = datos.map(dato => dato.presupuesto);

                // Configura el gráfico
                const ctx = document.getElementById('graficoBarras').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: etiquetas,
                        datasets: [{
                            label: 'Presupuesto por Convocatoria (USD)',
                            data: valores,
                            backgroundColor: 'rgba(75, 192, 192, 0.6)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
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
                                        // Formatea el valor como moneda
                                        return `Presupuesto: $${tooltipItem.raw.toLocaleString()}`;
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Número de Convocatoria', // Título del eje X
                                    font: {
                                        size: 14
                                    }
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Presupuesto', // Título del eje Y
                                    font: {
                                        size: 14
                                    }
                                },
                                ticks: {
                                    callback: function(value) {
                                        // Formatea el valor como moneda
                                        return `$${value.toLocaleString()}`;
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
