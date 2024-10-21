@extends('layouts.default')
@section('content')


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $viaje->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $viaje->idproyecto)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('viaticos.show', $viaje->idproyecto)}}">Viáticos Nacionales</a></li>
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
                    	<label class="font-weight-bold">Actividad:&nbsp;</label>{{$viaje->nombreactividad}}
                
                    	<br>
                    	<label class="font-weight-bold">Departamento:&nbsp;</label>{{$viaje->departamento}}

                        <br>
                        <label class="font-weight-bold">Destino:&nbsp;</label>{{$viaje->destinoviaje}}
                        <br>
                        <label class="font-weight-bold">Distancia en KM:&nbsp;</label>{{$viaje->kmsarecorrer}}
                
                       <br>
                        <label class="font-weight-bold">Hora de llegada:&nbsp;</label>{{$viaje->horallegada}}
                
                        <br>
                        <label class="font-weight-bold">Hora de salida:&nbsp;</label>{{$viaje->horasalida}}

                        <br>
                        <label class="font-weight-bold">Cantidad de vales de combustible ($10 c/u):&nbsp;</label>{{$viaje->cantidadvalescombustible}}

                        <br>
                        <label class="font-weight-bold">Cantidad de días:&nbsp;</label>{{$viaje->cantidaddias}}

                        <br>
                        <label class="font-weight-bold">Número de personas:&nbsp;</label>{{$viaje->cantidadpersonas}}
                
                
                
                        <br>
                        <label class="font-weight-bold">Total:&nbsp; </label>${{$viaje->totalplanviaje}}
                    	
                    	<br><br><br>

                  <form action="{{ route('viaticos.destroy', $viaje->idpreviajelocal) }}" method="POST" style="display:inline">
                    	@csrf
                    	@method('DELETE')
                    	<button class="btn btn-danger btn-md" type="submit">Borrar</button>
                      <a  class="btn btn-secondary float-right" href="{{route('viaticos.show', $viaje->idproyecto)}}">Regresar</a>


                	</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
