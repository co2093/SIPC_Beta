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
        <li class="breadcrumb-item active" aria-current="page">Contrataciones</li>
      </ol>
    </nav>

     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Ver contrataciones del personal de investigación
                         <a  class="btn btn-success float-right" href="{{route('personal.crear', $cod)}}">Agregar</a>
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
                                    <th scope="col">Pago por Hora</th>
                                    <th scope="col">Fuente</th>
                                    <th scope="col">Horas</th>
                                    <th scope="col">Subtotal</th>
                                     <th scope="col" class="fixed-col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($personal as $p)
                                <tr>
                                    <td>{{$p->nombretipocontratacion}}</td>
                                    <td>${{$p->pago}}</td>
                                    @if($p->idfuente > 0)
                                    <td>{{$p->descripcionfuente}}</td>
                                    @else
                                    <td>Convocatoria</td>
                                    @endif
                                    <td>{{$p->dias}}</td>
                                    <td>${{$p->total}}</td>
                                    <td class="fixed-col">
                                <a  class="btn btn-primary btn-sm" href="{{ route('personal.edit', $p->idcontratacion) }}"><i class="fas fa-edit"></i></a>                                        
                                <a  class="btn btn-danger btn-sm" href="{{ route('personal.delete', $p->idcontratacion) }}"><i class="fas fa-trash-alt"></i></a>

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
                      <a  class="btn btn-secondary float-right" href="{{route('presupuesto.menu.show', $cod)}}">Regresar</a>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
