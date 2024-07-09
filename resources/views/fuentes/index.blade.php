@extends('layouts.default')
@section('content')

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $cod)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $cod)}}">Presupuesto</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('fuentes.show', $cod) }}">Financiamientos</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Registrar fuente de financiamiento</li>
	  </ol>
	</nav>

     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Registrar fuente</h6>
                    </div>

                    <div class="card-body">




                
                    <form method="POST" action="{{ route('fuentes.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf

                  <div class="form-group">
                       <input type="hidden" value="{{$cod}}" name="cod" >
                  </div>

  					<div class="form-group">
					    <label for="exampleFormControlInput1">Nombre de la institución</label>
					    <input type="text" class="form-control" name="descripcion" placeholder="Nombre" required>
					  </div>

					 

				  	<div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo</label>
					    <select class="form-control" name="externa" required>
					      <option value="true">Cooperacion externa</option>
					      <option value="false">Fuentes nacionales externas a la UES</option>
					    </select>
					</div>



				  	<div class="form-group">
					    <label for="exampleFormControlSelect1">Rubro</label>
					    <select class="form-control" name="rubro" required>
					    	@foreach($rubros as $r)
					    		<option value="{{$r->idrubro}}">{{$r->rubro}}</option>
					    	@endforeach
					    </select>
					  </div>


					 <div class="form-group">
					    <label for="exampleFormControlInput1">Financiamiento</label>
					    <input type="number" class="form-control" name="financiamiento" 
					    step="0.01" min="0" 		
					    onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)"
					    required>
					 </div>

					  <button type="submit" class="btn btn-danger">Guardar</button>
					   <a  class="btn btn-secondary float-right" href="{{route('fuentes.show', $cod)}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
