@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Proyectos de investigación</h1>
    </div>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ver proyectos</li>
      </ol>
    </nav>

     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <a  class="btn btn-success float-right" href="{{route('projects.crear')}}">Agregar</a>

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
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>AE2024</td>
                                    <td>Ejemplo</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm mr-2"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>EA2023</td>
                                    <td>Proyecto</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm mr-2"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <!-- More rows as needed -->
                            </tbody>
                        </table>


                         <!-- Pagination -
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>

                    -->

                    </div>
            </div>
        </div>                    
    </div>





@endsection
