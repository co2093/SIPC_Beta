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
                    	
                    	<br>
                    	<label>Nombre completo: </label>{{$col->nombrecompleto}}
                
                    	<br>
                    	<label>Facultad: </label>{{$facu->nombrefacultad}}

                        <br>
                        <label>Tipo: </label>{{$tp->nombretipocolaborador}}

                        <br>
                        <label>Ad Honorem: </label>
                        @if($col->adhonorem == 1)
                        Sí
                        @else
                        No
                        @endif
                        <br>
                        <label>Sexo: </label>
                        @if($col->sexo == 1)
                        Masculino
                        @else
                        Femenino
                        @endif

                    	
                    	<br><br><br>

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
