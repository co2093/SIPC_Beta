@extends('layouts.default')
@section('content')


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('inventario.show')}}">Inventario</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detalles</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Detalles del recurso</h6>
                    </div>

                    <div class="card-body">
                    	
                    	<br>
                    	<label>Código: </label>{{$inv->codinventario}}
                
                    	<br>
                    	<label>Nombre: </label>{{$inv->descripcionbien}}

                    	<br>
                    	<label>Cantidad: </label>{{$inv->cantidad}}

							<br>
                    	<label>Ubicación: </label>{{$inv->ubicacion}}


							<br>
                    	<label>Especificaciones: </label>{{$inv->especificacion}}                    	
                    
							<br>
                    	<label>Serie: </label>{{$inv->serie}}
							
							<br>
                    	<label>Facultad: </label>{{$inv->facultad}}
					
                    			<br>
                    	<label>Estado: </label>
                

                    	@foreach($estados as $j)
							@if($j->idcondicioninventario == $inv->idcondicioninventario)
							{{$j->condicion}}
							@endif
						@endforeach

							<br>
                    	<label>Costo: </label>{{$inv->valor}}

                    	<br><br><br>

                 
                    	 <a  class="btn btn-secondary float-right" href="{{route('inventario.show')}}">Regresar</a>


                	</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
