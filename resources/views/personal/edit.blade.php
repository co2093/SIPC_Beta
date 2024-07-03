@extends('layouts.default')
@section('content')



	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $personal->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $personal->idproyecto)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('personal.show', $personal->idproyecto)}}">Contrataciones</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Editar personal</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Editar contratación de personal de investigación</h6>
                    </div>

                    <div class="card-body">
                
                    <form method="POST" action="{{ route('personal.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf


                    <div class="form-group">
                        <input type="hidden" value="{{$personal->idproyecto}}" name="cod" >
                    </div>
					
                    <div class="form-group">
                        <input type="hidden" value="{{$personal->idcontratacion}}" name="idcontratacion" >
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
					    <label for="exampleFormControlInput1">Pago por hora</label>
					    <input type="number" class="form-control" id="pago" name="pago"  min="0" step="0.1"
					    value="{{$personal->pago}}" 
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
					    placeholder="0.0">
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlInput1">Horas laborales</label>
					    <input type="number" class="form-control" id="dias" name="dias" min="1" step="1" 
					    value="{{$personal->dias}}" 
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
					    placeholder="0">
					  </div>




					  <button type="submit" class="btn btn-danger">Guardar</button>
					  <a  class="btn btn-secondary float-right" href="{{route('personal.show', $personal->idproyecto)}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection