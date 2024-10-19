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
                    	
                        <label class="font-weight-bold">Actividad:&nbsp;</label>{{$viaje->nombreactividad}}
                
                    	<br>
                    	<label class="font-weight-bold">País:&nbsp;</label>{{$viaje->nombrepais}}

                        <br>
                        <label class="font-weight-bold">Destino:&nbsp;</label>{{$viaje->destinoviaje}}

                        <br>
                        <label class="font-weight-bold">Cantidad de personas:&nbsp;</label>{{$viaje->cantidadpersonas}}


                        <br>
                        <label class="font-weight-bold">Cantidad de días:&nbsp;</label>{{$viaje->numerodias}}


                        <br>
                        <label class="font-weight-bold">Fuente de financiamiento:&nbsp;</label>{{$viaje->descripcionfuente}}


                        <br>
                        <label class="font-weight-bold">Monto solicitado a la fuente:&nbsp;</label>${{$viaje->montofuente}}


                        <br>
                        <label class="font-weight-bold">Monto solicitado a la SIC UES:&nbsp;</label>${{$viaje->montoconvocatoria}}
                
                
                        <br>
                        <label class="font-weight-bold">Total:&nbsp;</label>${{$viaje->totalplanviajeext}}
                    	
                        <hr class="my-4">

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
