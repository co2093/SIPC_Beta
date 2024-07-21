@extends('layouts.default')
@section('content')
@if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
@endif
@if (session('error'))
        <div style="color: red; margin-bottom: 20px;">
            {{ session('error') }}
        </div>
@endif


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
                        <div class="table-responsive table-wrapper">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Unidad</th>
                                    <th scope="col">Fuente</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col" class="fixed-col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($recursos as $r)
                                    <tr>
                                        <td>{{$r->nombretiporecurso}}</td>
                                        <td>{{$r->nombrerecurso}}</td>
                                        <td>{{$r->nombreunidadmedida}}</td>
                                        @if($r->descripcionfuente)
                                        <td>{{$r->descripcionfuente}}</td>
                                        @else
                                        <td>Convocatoria</td>
                                        @endif
                                        <td>{{$r->cantidadrecurso}}</td>
                                        <td>${{$r->preciorecurso}}</td>
                                        <td>${{$r->subtotalrecurso}}</td>
                                        <td class="fixed-col">
                                        <a  class="btn btn-primary btn-sm" href="{{ route('recursos.edit', $r->idrecurso) }}"><i class="fas fa-edit"></i></a>                                        
                                        <a  class="btn btn-danger btn-sm" href="{{ route('recursos.delete', $r->idrecurso) }}"><i class="fas fa-trash-alt"></i></a>

                                        </td>
                                    </tr>
                               @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>$
                                        @foreach($total as $t)
                                            {{$t->sum}}
                                        @endforeach
                                        </b>
                                    </td>
                                </tr>
                            </tfoot>  
                        </table>
                        </div>
                    <a  class="btn btn-danger" href="{{route('recursos.end', $cod)}}">Finalizar</a>  

                      <a  class="btn btn-secondary float-right" href="{{route('presupuesto.menu.show', $cod)}}">Regresar</a>


                    </div>
            </div>
        </div>                    
    </div>





@endsection
