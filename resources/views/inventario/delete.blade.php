@extends('layouts.default')
@section('content')


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('inventario.show')}}">Inventario</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Eliminar</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Confirme la eliminición del recurso</h6>
                    </div>

                    <div class="card-body">
                    	
                    	           <div class="card mb-3">
                        <div class="card-body">
                    	
        	            <p><strong>Serie: </strong>{{$inv->serie}}</p>                
                    	<p><strong>Nombre del bien: </strong>{{$inv->descripcionbien}}</p>
                    	<p><strong>Facultad: </strong>{{$inv->facultad}}</p>
                    	<p><strong>Ubicación actual: </strong>{{$inv->ubicacion}}</p>
                    	<p><strong>Cantidad: </strong>{{$inv->cantidad}}</p>
                    	<p><strong>Costo unitario: </strong><span class="monto">{{$inv->valor}}</span></p>
                    	<p><strong>Estado: </strong>{{$inv->condicion}}</p>
                    	<p><strong>Especificaciones técnicas: </strong>{{$inv->especificacion}}</p>


                                 	

            

                    </div></div>
								<hr class="my-4">
                        <div class="alert alert-light" role="alert">
                            <strong>Nota:</strong> Todos los montos están expresados en dólares estadounidenses (USD).
                        </div>
                        <hr class="my-4">

                  <form action="{{ route('inventario.destroy', $inv->codinventario) }}" method="POST" style="display:inline">
                    	@csrf
                    	@method('DELETE')
                    	<button class="btn btn-danger btn-md" type="submit">Borrar</button>
                    	 <a  class="btn btn-secondary float-right" href="{{route('inventario.show')}}">Cancelar</a>


                	</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
