@extends('layouts.default')
@section('content')


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>

        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $act->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{ route('actividades.show', $act->idproyecto) }}">Actividades</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Eliminar actividad</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Confirme la eliminición de la actividad</h6>
                    </div>

                    <div class="card-body">
                    	
                    	<br>
                    	<label>Objetivo específico asociado: </label>{{$obje->descripcion}}
                
                    	<br>
                    	<label>Tipo de actividad: </label>{{$tp->nombretipoactividad}}

                        <br>
                        <label>Descripción de la actividad: </label>{{$act->nombreactividad}}

                        <br>
                        <label>Fecha inicio de actividad: </label>{{$act->fechainicioactividad}}

                        <br>
                        <label>Fecha fin de actividad: </label>{{$act->fechafinactividad}}

                    	
                    	<br><br><br>

                  <form action="{{ route('actividades.destroy', $act->idactividad) }}" method="POST" style="display:inline">
                    	@csrf
                    	@method('DELETE')
                    	<button class="btn btn-danger btn-md" type="submit">Borrar</button>
                    	 <a  class="btn btn-secondary float-right" href="{{ route('actividades.show', $act->idproyecto) }}">Cancelar</a>


                	</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
