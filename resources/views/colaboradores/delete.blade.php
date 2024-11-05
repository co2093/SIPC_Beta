@extends('layouts.default')
@section('content')


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>

        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $col->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{ route('colaboradores.show', $col->idproyecto) }}">Colaboradores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Eliminar colaborador</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Confirme la eliminición del colaborador</h6>
                    </div>

                    <div class="card-body">
                    	
                    <div class="card mb-3">
                        <div class="card-body">

                            <p><strong>Nombre completo: </strong>{{$col->nombrecompleto}}</p>
                            <p><strong>Facultad: </strong> {{$col->nombrefacultad}}                        
                            </p>
                            <p><strong>Sexo:</strong> {{$col->sexodescr}}</p>
                            <p><strong>Tipo:</strong> {{$col->nombretipocolaborador}}</p>
                        </div>
                    </div>

                    <hr class="my-4">


                  <form action="{{ route('colaboradores.destroy', $col->idcolaborador) }}" method="POST" style="display:inline">
                    	@csrf
                    	@method('DELETE')
                    	<button class="btn btn-danger btn-md" type="submit">Borrar</button>
                    	 <a  class="btn btn-secondary float-right" href="{{ route('colaboradores.show', $col->idproyecto) }}">Cancelar</a>


                	</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
