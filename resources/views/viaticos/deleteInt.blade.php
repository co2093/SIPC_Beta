@extends('layouts.default')
@section('content')


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $viaje->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $viaje->idproyecto)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('viaticos.int.show', $viaje->idproyecto)}}">Viáticos Internacionales</a></li>
        <li class="breadcrumb-item active" aria-current="page">Eliminar viático</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Confirme la eliminición del viático</h6>
                    </div>

                    <div class="card-body">
                    	
                    	<br>
                    	<label>Actividad: </label>{{$viaje->nombreactividad}}
                
                    	<br>
                    	<label>País: </label>{{$viaje->nombrepais}}

                        <br>
                        <label>Destino: </label>{{$viaje->destinoviaje}}
                
                
                        <br>
                        <label>Total: $</label>{{$viaje->totalplanviajeext}}
                    	
                    	<br><br><br>

                  <form action="{{ route('viaticos.int.destroy', $viaje->idpreviajeexterior) }}" method="POST" style="display:inline">
                    	@csrf
                    	@method('DELETE')
                    	<button class="btn btn-danger btn-md" type="submit">Borrar</button>
                      <a  class="btn btn-secondary float-right" href="{{route('viaticos.int.show', $viaje->idproyecto)}}">Regresar</a>


                	</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
