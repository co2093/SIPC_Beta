@extends('layouts.default')
@section('content')

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registro</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">


                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Registrar proyecto de investigacion</h6>
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
                        <a href="{{route('projects.crear', $cod)}}" class="step-number completed-step">
                            <span class="fa fa-check-circle fa-2x"></span>
                            <p>Titulo</p>
                        </a>
                    </div>

                    
                    <!-- Step 2 -->
                    <div class="col text-center">
                        <a href="{{route('objetivos.show', $cod)}}" class="step-number completed-step">
                            <span class="fa fa-check-circle fa-2x"></span>
                            <p>Objetivos</p>
                        </a>
                    </div>

                    <!-- Step 3 -->
                    <div class="col text-center">
                        <a href="{{route('actividades.show', $cod)}}" class="step-number current-step">
                            <span class="fa fa-edit fa-2x"></span>
                            <p>Actividades</p>
                        </a>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="col text-center">
                        <a href="{{route('presupuesto.menu.show', $cod)}}" class="step-number pending-step">
                            <span class="fa fa-clock fa-2x"></span>
                            <p>Presupuesto</p>
                        </a>
                    </div>

                    <!-- Step 5 -->
                    <div class="col text-center">
                        <a href="{{route('colaboradores.show', $cod)}}" class="step-number pending-step">
                            <span class="fa fa-clock fa-2x"></span>
                            <p>Colaboradores</p>
                        </a>
                    </div>

                    <!-- Step 6 -->
                    <div class="col text-center">
                        <a href="{{route('projects.protocolo')}}" class="step-number pending-step">
                            <span class="fa fa-clock fa-2x"></span>
                            <p>Protocolo</p>
                        </a>
                    </div>

                    <!-- Step 7 -->
                    <div class="col text-center">
                        <a href="{{route('projects.enviar')}}" class="step-number pending-step">
                            <span class="fa fa-clock fa-2x"></span>
                            <p>Enviar</p>
                        </a>
                    </div>
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
                        <h6 class="m-0 font-weight-bold text-dark">Proyecto actual</h6>
                    </div>

                    <div class="card-body">


                        <div class="table-responsive table-wrapper">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Área</th>
                                    <th scope="col">Convocatoria</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col" class="fixed-col">Acciones</th>
                                   
                                </tr>
                            </thead>
                            <tbody>


                                    <tr>
                                        <td>{{$proyectos->idproyecto}}</td>
                                        <td>{{$proyectos->tituloproyecto}}</td>
                                        <td>{{$proyectos->tipoproyecto}}</td>
                                        <td>{{$proyectos->nombreareaconocimiento}}</td>
                                        <td>{{$proyectos->idconvocatoria}}</td>
                                        <td>{{$proyectos->nombreestadoproyecto}}</td>
                                        <td class="fixed-col">
                                    
                                        <a  class="btn btn-danger btn-sm" 
                                        href="#">Eliminar</a>


                                        </td>
                                    </tr>

                              
                                <!-- More rows as needed -->
                            </tbody>
                        </table>

                        </div>
                   

                    </div>
            </div>
        </div>                    
    </div>





@endsection
