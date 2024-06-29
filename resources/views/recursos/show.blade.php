@extends('layouts.default')
@section('content')


    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $cod)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $cod)}}">Presupuesto</a></li>
        <li class="breadcrumb-item active" aria-current="page">Recursos</li>
      </ol>
    </nav>

     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Ver recursos de investigación
                        <a  class="btn btn-success float-right" href="{{route('recursos.crear', $cod)}}">Agregar</a>
                        </h6>
                    </div>

                    <div class="card-body">


                        <!-- Search Box -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="searchInput" placeholder="Buscar...">
                            </div>
                        </div>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                     <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($recursos as $r)
                                    <tr>
                                        <td>{{$r->idtiporecurso}}</td>
                                        <td>{{$r->nombrerecurso}}</td>
                                        <td>{{$r->cantidadrecurso}}</td>
                                        <td>
                                        <a  class="btn btn-primary btn-sm" href="#"><i class="fas fa-edit"></i></a>                                        
                                        <a  class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash-alt"></i></a>

                                        </td>
                                    </tr>
                               @endforeach

                            </tbody>
                        </table>
                      <a  class="btn btn-secondary float-right" href="{{route('presupuesto.menu.show', $cod)}}">Regresar</a>


                    </div>
            </div>
        </div>                    
    </div>





@endsection
