@extends('layouts.default')
@section('content')


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $publicacion->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $publicacion->idproyecto)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('publicaciones.show', $publicacion->idproyecto)}}">Publicaciones</a></li>
        <li class="breadcrumb-item active" aria-current="page">Eliminar publicación</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Confirme la eliminición de la publicación:</h6>
                    </div>

                    <div class="card-body">
                 <div class="card mb-3">
                        <div class="card-body">


                        <p><strong>Tipo de publicación: </strong>{{$publicacion->nombretipopublicacion}}</p>
                        <p><strong>Alcance: </strong>{{$publicacion->nivel}}</p>
                        <p><strong>Detalles: </strong>{{$publicacion->detallepublicacion}}</p>
                        <p><strong>Fuente de financiamiento: </strong>{{$publicacion->descripcionfuente}}</p>



            <p><strong>Monto financiado: </strong> <span class="monto">{{$publicacion->montofuente}}</span></p>
            <p><strong>Monto convocatoria: </strong> <span class="monto">{{$publicacion->montoconvocatoria}}</span></p>
            <p><strong>Total: </strong> <span class="monto">{{$publicacion->montopublicacion}}</span></p>

                
                    </div></div>
<hr class="my-4">
                        <div class="alert alert-light" role="alert">
                            <strong>Nota:</strong> Todos los montos están expresados en dólares estadounidenses (USD).
                        </div>
                        <hr class="my-4">
                  <form action="{{ route('publicaciones.destroy', $publicacion->idpublicacion) }}" method="POST" style="display:inline">
                    	@csrf
                    	@method('DELETE')
                    	<button class="btn btn-danger btn-md" type="submit">Borrar</button>
                      <a  class="btn btn-secondary float-right" href="{{route('publicaciones.show', $publicacion->idproyecto)}}">Regresar</a>


                	</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
