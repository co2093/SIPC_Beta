@extends('layouts.default')
@section('content')

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $fuente->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $fuente->idproyecto)}}">Presupuesto</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('fuentes.show', $fuente->idproyecto) }}">Financiamientos</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Editar fuente de financiamiento</li>
	  </ol>
	</nav>

     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Editar fuente de financiamiento</h6>
                    </div>

                    <div class="card-body">




                
                    <form method="POST" action="{{ route('fuentes.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf

                  <div class="form-group">
                       <input type="hidden" value="{{$fuente->idproyecto}}" name="cod" >
                  </div>

                     <div class="form-group">
                       <input type="hidden" value="{{$fuente->idfuente}}" name="idfuente" >
                  </div>

                  <div class="form-group">
                       <input type="hidden" value="{{$fuente->financiamiento}}" name="anterior" >
                  </div>

  					<div class="form-group">
					    <label for="exampleFormControlInput1">Nombre de la institución</label>
					    <input type="text" class="form-control" name="descripcion" placeholder="Nombre" value="{{$fuente->descripcionfuente}}" required>
					  </div>

					 

				  	<div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo</label>
					    <select class="form-control" name="externa" required>
					    	@if($fuente->esexterno == "true")			
					      <option value="true">Cooperacion externa internacional</option>
					      <option value="false">Fuentes nacionales externas a la UES</option>

					      @else
					      <option value="false">Fuentes nacionales externas a la UES</option>
					  	<option value="true">Cooperacion externa</option>
					      @endif

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
					    <label for="exampleFormControlInput1">Financiaminto</label>
					    <input type="number" class="form-control" name="financiamiento" placeholder="" min="1"                   
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{$fuente->financiamiento}}" required>
					 </div>

					  <button type="submit" class="btn btn-danger">Guardar</button>
					   <a  class="btn btn-secondary float-right" href="{{route('fuentes.show', $fuente->idproyecto)}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
