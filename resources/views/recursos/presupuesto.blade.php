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
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $cod)}}">Registro</a></li>
        <li class="breadcrumb-item active" aria-current="page">Presupuesto</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">


                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Gestión del presupuesto del proyecto de investigación</h6>
                    </div>
        <div class="card-body">


            <div class="container mt-5">
                <!-- Progress Bar -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{$completado}}%"aria-valuenow="{{$completado}}" aria-valuemin="0" aria-valuemax="100">{{$completado}}%</div>
                </div>

                <!-- Tabs Navigation -->
                <ul class="nav nav-pills nav-justified flex-column flex-md-row" id="myTab" role="tablist">

                </ul>

            </div>




            <div class="container mt-5">


                <div class="row">
                    <!-- Step 1 -->
                    <div class="col text-center">
                        @if($pasos->fuentes == 1)
                        <a href="{{route('fuentes.show', $cod)}}" class="step-number completed-step">
                        @else
                        <a href="{{route('fuentes.show', $cod)}}" class="step-number pending-step">
                        @endif 
                            <span class="fa fa-university fa-2x"></span>
                            <p>Fuentes de financiamientos</p>
                        </a>
                    </div>

                    
                    <!-- Step 2 -->
                    <div class="col text-center">
                        @if($pasos->recursos == 1)
                        <a href="{{route('recursos.show', $cod)}}" class="step-number completed-step">
                        @else
                        <a href="{{route('recursos.show', $cod)}}" class="step-number pending-step">
                        @endif 
                            <span class="fa fa-laptop fa-2x"></span>
                            <p>Recursos</p>
                        </a>
                    </div>

                    <!-- Step 3 -->
                    <div class="col text-center">
                        @if($pasos->contrataciones == 1)
                        <a href="{{route('personal.show', $cod)}}" class="step-number completed-step">
                        @else
                        <a href="{{route('personal.show', $cod)}}" class="step-number pending-step">
                        @endif 
                            <span class="fa fa-user-circle fa-2x"></span>
                            <p>Contrataciones</p>
                        </a>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="col text-center">
                        @if($pasos->nacionales == 1)
                        <a href="{{route('viaticos.show', $cod)}}" class="step-number completed-step">
                        @else
                        <a href="{{route('viaticos.show', $cod)}}" class="step-number pending-step">
                        @endif 
                            <span class="fa fa-car fa-2x"></span>
                            <p>Viáticos Nacionales</p>
                        </a>
                    </div>

                    <!-- Step 5 -->
                    <div class="col text-center">
                        @if($pasos->internacionales == 1)
                        <a href="{{route('viaticos.int.show', $cod)}}" class="step-number completed-step">
                        @else
                        <a href="{{route('viaticos.int.show', $cod)}}" class="step-number pending-step">
                        @endif
                            <span class="fa fa-plane fa-2x"></span>
                            <p>Viáticos Internacionales</p>
                        </a>
                    </div>

                    <!-- Step 6 -->
                    <div class="col text-center">
                        @if($pasos->pulicaciones == 1)
                        <a href="{{route('publicaciones.show', $cod)}}" class="step-number completed-step">
                        @else
                        <a href="{{route('publicaciones.show', $cod)}}" class="step-number pending-step">
                        @endif
                            <span class="fa fa-book fa-2x"></span>
                            <p>Publicaciones</p>
                        </a>
                    </div>

                    <!-- Step 7 
                    <div class="col text-center">
                        <a href="#step7" class="step-number pending-step">
                            <span class="fa fa-clock fa-2x"></span>
                            <p>Paso 7</p>
                        </a>
                    </div>
                    -->


                </div>
            </div>

</div>
</div>
</div>
</div>





     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Presupuesto actual del proyecto</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Convocatoria</th>
                                    <th scope="col">Recursos</th>
                                    <th scope="col">Contrataciones</th>
                                    <th scope="col">Viáticos nacionales</th>
                                    <th scope="col">Viáticos internacionales</th>
                                    <th scope="col">Publicaciones</th>
                                    <th scope="col">Disponible</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="monto">{{$pre->montoconvocatoria}}</td>
                                    <td class="monto">{{$pre->montorecursos}}</td>
                                    <td class="monto">{{$pre->montocontratacion}}</td>
                                    <td class="monto">{{$pre->montonacionales}}</td>
                                    <td class="monto">{{$pre->montointernacionales}}</td>
                                    <td class="monto">{{$pre->montopublicaciones}}</td>
                                    
                                    <td class="monto">{{$pre->montodisponible}}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                        </div>
                        <hr class="my-4">
                        <div class="alert alert-light" role="alert">
                            <strong>Nota:</strong> Todos los montos están expresados en dólares estadounidenses (USD).
                        </div>
                        <hr class="my-4">
                     <a  class="btn btn-secondary float-right" href="{{route('projects.prueba', $cod)}}">Regresar</a>


                </div>
            </div>
        </div>                    
    </div>





@endsection
