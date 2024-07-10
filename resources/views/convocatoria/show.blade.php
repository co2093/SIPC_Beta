@extends('layouts.default')
@section('content')

@if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
@endif

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Convocatoria de Proyectos de investigación</h1>
    </div>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Convocatorias</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                       <h6 class="m-0 font-weight-bold text-dark">Convocatoria activa
                           <a  class="btn btn-success float-right" href="{{route('convocatoria.crear')}}">Iniciar nueva</a>
                       </h6>

                    </div>

                    <div class="card-body">

                    <!-- Search Box -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="searchInput" placeholder="Buscar...">
                            </div>
                        </div>
                        <div class="table-responsive table-wrapper">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Número</th>
                                    <th scope="col">Año</th>
                                    <th scope="col">Fecha Inicio</th>
                                    <th scope="col">Fecha Fin</th>
                                     <th scope="col">Presupuesto</th>
                                     <th scope="col" class="fixed-col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                               @foreach($convocatorias as $c)
                                    <tr>
                                        <td>{{$c->numeroconvocatoria}}</td>
                                        <td>{{$c->anoconvocatoria}}</td>
                                        <td>{{$c->fechainicio}}</td>
                                        <td>{{$c->fechafin}}</td>
                                        <td>$ {{$c->presupuesto}}</td>

                                        <td class="fixed-col">
                                        <a  class="btn btn-info btn-sm" href="#"><i class="fas fa-eye"></i></a>  
                                        <a  class="btn btn-primary btn-sm" href="#"><i class="fas fa-edit"></i></a>                                        
                                        <a  class="btn btn-danger btn-sm" 
                                        href="#"><i class="fas fa-trash"></i></a>


                                        </td>
                                    </tr>
                               @endforeach

                            </tbody>
                        </table>
                        </div>
                      <a  class="btn btn-secondary float-right" href="{{route('home')}}">Regresar</a>


                    </div>
            </div>
        </div>                    
    </div>





@endsection
