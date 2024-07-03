@extends('layouts.default')
@section('content')
@if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
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
                    <div class="progress-bar" role="progressbar" style="width: 16.6%" aria-valuenow="16.6" aria-valuemin="0" aria-valuemax="100">20%</div>
                </div>

                <!-- Tabs Navigation -->
                <ul class="nav nav-pills nav-justified flex-column flex-md-row" id="myTab" role="tablist">

                </ul>

            </div>




            <div class="container mt-5">


                <div class="row">
                    <!-- Step 1 -->
                    <div class="col text-center">
                        <a href="{{route('fuentes.show', $cod)}}" class="step-number completed-step">
                            <span class="fa fa-university fa-2x"></span>
                            <p>Financiamientos</p>
                        </a>
                    </div>

                    
                    <!-- Step 2 -->
                    <div class="col text-center">
                        <a href="{{route('recursos.show', $cod)}}" class="step-number completed-step">
                            <span class="fa fa-laptop fa-2x"></span>
                            <p>Recursos</p>
                        </a>
                    </div>

                    <!-- Step 3 -->
                    <div class="col text-center">
                        <a href="{{route('personal.show', $cod)}}" class="step-number current-step">
                            <span class="fa fa-user-circle fa-2x"></span>
                            <p>Contrataciones</p>
                        </a>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="col text-center">
                        <a href="{{route('viaticos.show', $cod)}}" class="step-number pending-step">
                            <span class="fa fa-car fa-2x"></span>
                            <p>Viáticos Nacionales</p>
                        </a>
                    </div>

                    <!-- Step 5 -->
                    <div class="col text-center">
                        <a href="{{route('viaticos.int.show')}}" class="step-number pending-step">
                            <span class="fa fa-plane fa-2x"></span>
                            <p>Viáticos Internacionales</p>
                        </a>
                    </div>

                    <!-- Step 6 -->
                    <div class="col text-center">
                        <a href="{{route('publicaciones.show')}}" class="step-number pending-step">
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

                            <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Total</th>
                                    <th scope="col">Disponible</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>${{$p->presupuestototal}}</td>
                                    <td>${{$p->disponible}}</td>
                                </tr>
                                
                            </tbody>
                        </table>

                     <a  class="btn btn-secondary float-right" href="{{route('projects.prueba', $cod)}}">Regresar</a>


                </div>
            </div>
        </div>                    
    </div>





@endsection
