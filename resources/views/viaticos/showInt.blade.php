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
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $cod)}}">Presupuesto</a></li>
        <li class="breadcrumb-item active" aria-current="page">Viáticos Internacionales</li>
      </ol>
    </nav>

     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Ver viáticos internacionales
                        <a  class="btn btn-success float-right" href="{{route('viaticos.int.crear', $cod)}}">Agregar</a>

                        </h6>
                    </div>

                    <div class="card-body">


                        <div class="table-responsive table-wrapper">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Actividad</th>
                                    <th scope="col">País</th>
                                    <th scope="col">Destino</th>
                                    <th scope="col">Personas</th>
                                    <th scope="col">Días</th>
                                    <th scope="col">Fuente</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Convocatoria</th>
                                     <th scope="col">Costo</th>
                                     <th scope="col" class="fixed-col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($viaje)    
                               <tr>
                                <td>{{$viaje->nombreactividad}}</td>
                                <td>{{$viaje->nombrepais}}</td>
                                <td>{{$viaje->destinoviaje}}</td>
                                <td>{{$viaje->cantidadpersonas}}</td>
                                <td>{{$viaje->numerodias}}</td>
                                <td>{{$viaje->descripcionfuente}}</td>
                                <td>{{$viaje->montofuente}}</td>
                                <td>{{$viaje->montoconvocatoria}}</td>
                                <td>{{$viaje->totalplanviajeext}}</td>
                                <td class="fixed-col">
                                <a  class="btn btn-primary btn-sm" href="{{route('viaticos.int.edit', $viaje->idpreviajeexterior)}}"><i class="fas fa-edit"></i></a>                                       
                                        <a  class="btn btn-danger btn-sm" href="{{route('viaticos.int.delete', $viaje->idpreviajeexterior)}}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                               </tr>
                               @endif
                            </tbody>
                        </table>
                        <hr class="my-4">

                        </div>
                    <a  class="btn btn-danger" href="{{route('viaticos.int.end', $cod)}}">Finalizar</a>  

                      <a  class="btn btn-secondary float-right" href="{{route('presupuesto.menu.show', $cod)}}">Regresar</a>


                    </div>
            </div>
        </div>                    
    </div>





@endsection
