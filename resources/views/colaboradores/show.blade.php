@extends('layouts.default')
@section('content')


    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>

        <li class="breadcrumb-item"><a href="{{route('projects.prueba')}}">Registro</a></li>
        <li class="breadcrumb-item active" aria-current="page">Colaboradores</li>
      </ol>
    </nav>

     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Ver colaboradores de investigación
                        <a  class="btn btn-success float-right" href="{{route('colaboradores.crear')}}">Agregar</a>

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
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Facultad</th>
                                     <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Maria Perez</td>
                                    <td>Medicina</td>
                                    <td>
                                        <button class="btn btn-success btn-sm mr-2"><i class="fas fa-eye"></i></button>

                                        <button class="btn btn-primary btn-sm mr-2"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Maria Hernandez</td>
                                    <td>Quimica</td>
                                    <td>
                                        <button class="btn btn-success btn-sm mr-2"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-primary btn-sm mr-2"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <!-- More rows as needed -->
                            </tbody>
                        </table>
                      <a  class="btn btn-secondary float-right" href="{{route('projects.prueba')}}">Regresar</a>


                    </div>
            </div>
        </div>                    
    </div>





@endsection
