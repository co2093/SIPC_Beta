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
                            <div class="card mb-3">
                        <div class="card-body">	
           <p><strong>Actividad: </strong>{{$viaje->nombreactividad}}</p>
           <p><strong>Departamento: </strong>{{$viaje->departamento}}</p>
           <p><strong>Municipio: </strong>{{$viaje->nombremunicipio}}</p>
           <p><strong>Destino: </strong>{{$viaje->destinoviaje}}</p>
           <p><strong>Distancia en KM: </strong>{{$viaje->kmsarecorrer}}</p>
           <p><strong>Hora salida: </strong>{{$viaje->horasalida}}</p>
           <p><strong>Hola llegada: </strong>{{$viaje->horallegada}}</p>
           <p><strong>Cantidad de vales de combustible: </strong>{{$viaje->cantidadvalescombustible}}</p>
           <p><strong>Cantidad de personas: </strong>{{$viaje->cantidadpersonas}}</p>
           <p><strong>Cantidad de días: </strong>{{$viaje->cantidaddias}}</p>

                    <p><strong>Fuente de financiamiento: </strong>{{$viaje->descripcionfuente}}</p>

                    <p><strong>Monto financiado: </strong> <span class="monto">{{$viaje->montofuente}}</span></p>
                    <p><strong>Monto convocatoria: </strong> <span class="monto">{{$viaje->montoconvocatoria}}</span></p>
                    <p><strong>Total: </strong> <span class="monto">{{$viaje->totalplanviaje}}</span></p>


                

                    	
                    </div></div>
<hr class="my-4">
                        <div class="alert alert-light" role="alert">
                            <strong>Nota:</strong> Todos los montos están expresados en dólares estadounidenses (USD).
                        </div>
                        <hr class="my-4">
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
