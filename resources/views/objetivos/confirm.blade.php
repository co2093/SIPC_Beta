@extends('layouts.default')
@section('content')


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>

        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $obj->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{ route('objetivos.show', $obj->idproyecto) }}">Objetivos</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Eliminar</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Confirme la eliminición del objetivo</h6>
                    </div>

                    <div class="card-body">
                    	
                    	<br>
                    	<label>Objetivo: </label>{{$obj->descripcion}}
                
                    	<br>
                    	<label>Tipo: </label>{{$obj->tipo}}

                    	
                    	<br><br><br>

                  <form action="{{ route('objetivos.destroy', $obj->idobjetivo) }}" method="POST" style="display:inline">
                    	@csrf
                    	@method('DELETE')
                    	<button class="btn btn-danger btn-md" type="submit">Borrar</button>
                    	 <a  class="btn btn-secondary float-right" href="{{ route('objetivos.show', $obj->idproyecto) }}">Cancelar</a>


                	</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
