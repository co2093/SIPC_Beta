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
        <li class="breadcrumb-item active" aria-current="page">Publicaciones</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Ver publicaciones de investigación
                        <a  class="btn btn-success float-right" href="{{route('publicaciones.crear', $cod)}}">Agregar</a>

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
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Fuente</th>
                                    <th scope="col">Detalle</th>
                                     <th scope="col">Costo</th>
                                     <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($publicaciones as $p)
                                    <tr>
                                        <td>{{$p->nombretipopublicacion}}</td>
                                        <td>{{$p->descripcionfuente}}</td>
                                        <td>{{$p->detallepublicacion}}</td>
                                        <td>{{$p->montopublicacion}}</td>
                                        <td>
                                        <a  class="btn btn-primary btn-sm" href="{{ route('publicaciones.edit', $p->idpublicacion) }}"><i class="fas fa-edit"></i></a>                                        
                                        <a  class="btn btn-danger btn-sm" href="{{ route('publicaciones.delete', $p->idpublicacion) }}"><i class="fas fa-trash-alt"></i></a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        </div>

                      <a  class="btn btn-secondary float-right" href="{{route('presupuesto.menu.show', $cod)}}">Regresar</a>



                    </div>
            </div>
        </div>                    
    </div>





@endsection
