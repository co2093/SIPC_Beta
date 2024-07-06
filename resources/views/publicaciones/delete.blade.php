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
                    	
                    	<br>
                    	<label>Tipo: </label>{{$publicacion->nombretipopublicacion}}
                
                    	<br>
                    	<label>Fuente: </label>{{$publicacion->descripcionfuente}}

                        <br>
                        <label>Detalles: </label>{{$publicacion->detallepublicacion}}
                
                       <br>
                        <label>Costo: </label>{{$publicacion->montopublicacion}}
                

                    	
                    	<br><br><br>

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
