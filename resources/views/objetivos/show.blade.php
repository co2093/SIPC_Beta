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
        <li class="breadcrumb-item active" aria-current="page">Objetivos</li>
      </ol>
    </nav>

     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Ver objetivos de investigación
                            <a  class="btn btn-success float-right" href="{{route('objetivos.crear', $cod)}}">Agregar</a>
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
                                    <th scope="col">Objetivo</th>
                                    <th scope="col">Tipo</th>
                                     <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                               

                                @foreach($obj as $o)
                                    <tr>
                                        <td>{{$o->descripcion}}</td>
                                        <td>
                                        @if($o->tipo == 1)
                                        General
                                        @else
                                        Especifico
                                        @endif    
                                        </td>
                                        <td>
                                        <a  class="btn btn-primary btn-sm" href="{{ route('objetivos.edit', $o->idobjetivo) }}"><i class="fas fa-edit"></i></a>                                        
                                        <a  class="btn btn-danger btn-sm" href="{{ route('objetivos.confirm', $o->idobjetivo) }}"><i class="fas fa-trash-alt"></i></a>

                                        </td>
                                    </tr>
                               @endforeach

                            </tbody>
                        </table>
                      <a  class="btn btn-secondary float-right" href="{{route('projects.prueba', $cod)}}">Regresar</a>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
