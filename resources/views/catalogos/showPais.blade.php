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
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Países</li>
      </ol>
    </nav>

     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Ver países
                        <a  class="btn btn-success float-right" href="{{route('pais.crear')}}">Agregar</a>

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
                                    <th scope="col">ISO</th>
                                         <th scope="col">Nombre</th>
                                         <th scope="col">Costo por día (USD)</th>
                                     <th scope="col" class="fixed-col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($paises as $i)
                                    <tr>
                                        <td>{{$i->iso}}</td>
                                        <td>{{$i->nombrepais}}</td>
                                        <td>{{$i->costo}}</td>
                                        <td class="fixed-col"> 
                                        <a  class="btn btn-primary btn-sm" href="{{ route('pais.edit', $i->idpais) }}"><i class="fas fa-edit"></i></a>                                        
                                        <a  class="btn btn-danger btn-sm" 
                                        href="{{ route('pais.delete', $i->idpais) }}"><i class="fas fa-trash"></i></a>


                                        </td>
                                    </tr>
                               @endforeach

                            </tbody>
                           </div> 
                        </table>
                         <div class="d-flex justify-content-center">
                        {{ $paises->links() }}
                        </div>

                      <a  class="btn btn-secondary float-right" href="{{ route('home') }}">Regresar</a>


                    </div>
            </div>
        </div>                    
    </div>





@endsection