@extends('layouts.default')
@section('content')



	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $cod)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $cod)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('viaticos.int.show', $cod)}}">Viáticos Internacionales</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Registrar viático internacional</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Viajes internacionales</h6>
                    </div>

                    <div class="card-body">
                
             <form method="POST" action="{{ route('viaticos.int.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf

@if($viaje)

					<div class="alert alert-danger" role="alert">
					  Ha alcanzado el límite de viajes internacionales.
					</div>
		
					<a  class="btn btn-secondary float-right" href="{{route('viaticos.int.show', $cod)}}">Regresar</a>


@else

 				<div class="form-group">
                        <input type="hidden" value="{{$cod}}" name="cod" >
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
					    <label for="exampleFormControlSelect1">País</label>
					    <select class="form-control" name="pais">
					    	@foreach($paises as $pa)
					    		<option value="{{$pa->idpais}}">{{$pa->nombrepais}}</option>
					    	@endforeach

					    </select>
					  </div>



					  	<div class="form-group">
					    <label for="exampleFormControlTextarea1">Destino del viaje</label>
					    <textarea class="form-control" name="destino" rows="3" required></textarea>
					  </div>




					  <div class="form-group">
					    <label for="exampleFormControlInput1">Costo del boleto aereo</label>
					    <input type="number" class="form-control" name="costoboleto" placeholder="0.0"
						onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required
					    >
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlInput1">Costo de la inscripción</label>
					    <input type="number" class="form-control" name="costoinscripcion" placeholder="0.0"
					    					    min="0"  step="0.1"                 
					    onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required
					    >
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlInput1">Número de personas</label>
					    <input type="number" class="form-control" name="numeropersonas" placeholder="0"
					    					    min="1"  step="1"                 
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57" required
					    >
					  </div>



					  <div class="form-group">
					    <label for="exampleFormControlInput1">Número de días</label>
					    <input type="number" class="form-control" name="numerodias" placeholder="0"
					    min="1"  step="1"                 
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57" required
					    >
					  </div>









					  <button type="submit" class="btn btn-danger">Guardar</button>
					 <a  class="btn btn-secondary float-right" href="{{route('viaticos.int.show', $cod)}}">Regresar</a>

@endif
                   


					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
