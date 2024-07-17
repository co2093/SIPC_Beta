@extends('layouts.default')
@section('content')



	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $cod)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $cod)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('personal.show', $cod)}}">Contrataciones</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Registrar personal</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Registrar contratación de personal de investigación</h6>
                    </div>

                    <div class="card-body">
                
                    <form method="POST" action="{{ route('personal.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf


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
					    <label for="exampleFormControlSelect1">Tipo de personal</label>
					    <select class="form-control" name="tipo">
					    	@foreach($tipo as $t)
					    		<option value="{{$t->idtipocontratacion}}">{{$t->nombretipocontratacion}}</option>
					    	@endforeach
					    </select>
					  </div>

				 <div class="form-group">
					    <label for="exampleFormControlSelect1">Fuente de financiamiento</label>
					    <select class="form-control" name="idfuente" required>
					   	<option value="0">Convocatoria, $({{$p->montoconvocatoria}})</option>
					   	@foreach($fuentes as $f)
					   	<option value="{{$f->idfuente}}">{{$f->descripcionfuente}}, (${{$f->financiamiento}})</option>
					   	@endforeach

					    </select>
				  </div>

				  


					  <div class="form-group">
					    <label for="exampleFormControlInput1">Horas laborales</label>
					    <input type="number" class="form-control" id="dias" name="dias" min="1" step="1" 
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
					    placeholder="0">
					  </div>




					  <button type="submit" class="btn btn-danger">Guardar</button>
					  <a  class="btn btn-secondary float-right" href="{{route('personal.show', $cod)}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
