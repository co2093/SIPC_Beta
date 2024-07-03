@extends('layouts.default')
@section('content')

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $viaje->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $viaje->idproyecto)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('viaticos.show', $viaje->idproyecto)}}">Viáticos Nacionales</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Editar viático</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Viajes locales</h6>
                    </div>

                    <div class="card-body">
                
             <form method="POST" action="{{ route('viaticos.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf



                    <div class="form-group">
                        <input type="hidden" value="{{$viaje->idproyecto}}" name="cod" >
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="{{$viaje->idpreviajelocal}}" name="idpreviajelocal" >
                    </div>


                    <div class="form-group">
					    <label for="exampleFormControlSelect1">Actividad asociada</label>
					    <select class="form-control" name="actividad">
			
					    	@foreach($actividades as $a)
					    		<option value="{{$a->idactividad}}">{{$a->nombreactividad}}</option>
					    	@endforeach
					    </select>
					  </div>


				 <div class="form-group">
					    <label for="exampleFormControlSelect1">Fuente de financiamiento</label>
					    <select class="form-control" name="idfuente" required>
					   	
					   	@foreach($fuentes as $f)
					   	<option value="{{$f->idfuente}}">{{$f->descripcionfuente}}</option>
					   	@endforeach

					    </select>
				  </div>



 					<div class="form-group">
					    <label for="exampleFormControlSelect1">Departamento</label>
					    <select class="form-control" name="iddepartamento">
			
					    	@foreach($departamentos as $d)
					    		<option value="{{$d->iddepartamento}}">{{$d->departamento}}</option>
					    	@endforeach

					    </select>
					  </div>



  					<div class="form-group">
					    <label for="exampleFormControlInput1">Destino</label>
					    <input type="text" class="form-control" name="destino"
					 
					     placeholder="Nombre del lugar" required>
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlInput1">KM a recorrer (ida+regreso)</label>
					    <input type="number" class="form-control" name="distancia" placeholder="0"
					    min="1"  step="1"  value="{{$viaje->kmsarecorrer}}"               
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57" required
					    >
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlInput1">Cantidad de vales de combustible</label>
					    <input type="number" class="form-control" name="vales" placeholder="0"
					    min="0"   step="1"    value="{{$viaje->cantidadvalescombustible}}"            
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
					  </div>


				 <div class="form-group">
					    <label for="exampleFormControlInput1">Hora de salida</label>
					    <input type="time" class="form-control" name="salida"  
					    value="{{$viaje->horasalida}}" 
					    required>
					  </div>




				 <div class="form-group">
					    <label for="exampleFormControlInput1">Hora de regreso</label>
					    <input type="time" class="form-control" name="regreso" 
					    value="{{$viaje->horallegada}}" 
					    required>
					  </div>


				  		<div class="form-group">
					    <label for="exampleFormControlInput1">Cantidad de días</label>
					    <input type="number" class="form-control" name="dias" placeholder="0" min="1" step="1" 
					    value="{{$viaje->cantidaddias}}" 
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
					    required>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlInput1">Cantidad de personas</label>
					    <input type="number" class="form-control" name="personas" placeholder="0" min="1" step="1" 
					    value="{{$viaje->cantidadpersonas}}" 

					    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
					    required>
					  </div>



					  <div class="form-group">
					    <label for="exampleFormControlInput1">Total por persona</label>
					    <input type="number" class="form-control" name="total" placeholder="$ 0.0" 
					    step="0.5" min="0" 	value="{{$viaje->totalplanviaje}}" 	required 
					    >
					  </div>



					  <button type="submit" class="btn btn-danger">Guardar</button>
					   <a  class="btn btn-secondary float-right" href="{{route('viaticos.show', $viaje->idproyecto)}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
