@extends('layouts.default')
@section('content')

@if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
@endif


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $recurso->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $recurso->idproyecto)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('recursos.show', $recurso->idproyecto)}}">Recursos</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Editar recurso</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Editar recurso</h6>
                    </div>

                    <div class="card-body">
                
             <form method="POST" action="{{ route('recursos.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf



                   	<div class="form-group">
                        <input type="hidden" value="{{$recurso->idproyecto}}" name="idproyecto" >
                    </div>


                   	<div class="form-group">
                        <input type="hidden" value="{{$recurso->idrecurso}}" name="idrecurso" >
                    </div>



				  <div class="form-group">
					    <label for="exampleFormControlSelect1">Actividad asociada</label>
					    <select class="form-control" name="idactividad" required>
					
					    	@foreach($actividades as $a)
					    		<option value="{{$a->idactividad}}">{{$a->nombreactividad}}</option>
					    	@endforeach

					    </select>
				  </div>



					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo de recurso</label>
					    <select class="form-control" name="tiporecurso" required>
						     @foreach($tipo as $t)
						     	<option value="{{$t->idtiporecurso}}">{{$t->nombretiporecurso}}</option>
						     @endforeach

					    </select>
					  </div>



					  	  <div class="form-group">
					    <label for="exampleFormControlSelect1">Unidad de medida</label>
					    <select class="form-control" name="unidad" required>
						    @foreach($unidades as $u)
						    <option value="{{$u->idunidadmedida}}">{{$u->nombreunidadmedida}}</option>
						    @endforeach
					    </select>
				  </div>



  					<div class="form-group">
					    <label for="exampleFormControlInput1">Nombre</label>
					    <input type="text" class="form-control" name="nombre"
					    value="{{$recurso->nombrerecurso}}" 
					     placeholder="Nombre del recurso" required>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Especifícaciones técnicas del recurso</label>
					    <textarea class="form-control" name="especificaciones" rows="3" required>{{$recurso->especificacionestecnicas}}</textarea>
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
					    <label for="exampleFormControlInput1">Costo unitario</label>
					    <input type="number" class="form-control" name="costo"  value="{{$recurso->preciorecurso}}" placeholder="" min="0.0"                   
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
					  </div>

					 <div class="form-group">
					    <label for="exampleFormControlInput1">Cantidad</label>
					    <input type="number" class="form-control" name="cantidad" value="{{$recurso->cantidadrecurso}}" min="0"                   
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
					  </div>


					


					  <button type="submit" class="btn btn-danger">Guardar</button>
					  <a  class="btn btn-secondary float-right" href="{{route('recursos.show', $recurso->idproyecto)}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
