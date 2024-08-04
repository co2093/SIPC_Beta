@extends('layouts.default')
@section('content')

@if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
@endif

     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Proyectos de investigación archivados

                        <a  class="btn btn-success float-right" href="{{route('archivados.nuevo')}}">Agregar</a>

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
                               <th scope="col">Código</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Convocatoria</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Área</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col" class="fixed-col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                              @foreach($proyectos as $i)
                                    <tr>
                                        <td>{{$i->idproyecto}}</td>
                                        <td>{{$i->tituloproyecto}}</td>
                                        <td>{{$i->idconvocatoria}}</td>
                            
                                        <td>{{$i->nombreestadoproyecto}}</td>
                                        <td>{{$i->nombreareaconocimiento}}</td>
                                        <td>{{$i->tipoproyecto}}</td>
                                        <td class="fixed-col">
                 
                                        <a  class="btn btn-primary btn-sm" href="{{ route('projects.prueba', $i->idproyecto) }}">Editar</a>                                        
                                       
                                        </td>
                                    </tr>
                               @endforeach


                            </tbody>
                        </table>


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


                    </div>
            </div>
        </div>                    
    </div>





@endsection
