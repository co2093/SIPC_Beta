@extends('layouts.default')
@section('content')


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $personal->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $personal->idproyecto)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('personal.show', $personal->idproyecto)}}">Contrataciones</a></li>
        <li class="breadcrumb-item active" aria-current="page">Eliminar personal</li>
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
                    	<label class="font-weight-bold">Actividad asociada: &nbsp;</label>{{$personal->nombreactividad}}
                
                    	<br>
                    	<label class="font-weight-bold">Tipo:&nbsp; </label>{{$personal->nombretipocontratacion}}

                        <br>
                        <label class="font-weight-bold">Pago:&nbsp; </label>${{$personal->pago}}

                        <br>
                        <label class="font-weight-bold">Fuente:&nbsp; </label>
                        @if($personal->descripcionfuente)
                        {{$personal->descripcionfuente}}
                        @else
                        Convocatoria
                        @endif


                        <br>
                        <label class="font-weight-bold">Horas laborales:&nbsp; </label>{{$personal->dias}}
                    	


                        <br>
                        <label class="font-weight-bold">Total:&nbsp; </label>${{$personal->total}}
                    	<br><br><br>

                  <form action="{{ route('personal.destroy', $personal->idcontratacion) }}" method="POST" style="display:inline">
                    	@csrf
                    	@method('DELETE')
                    	<button class="btn btn-danger btn-md" type="submit">Borrar</button>
                      <a  class="btn btn-secondary float-right" href="{{route('personal.show', $personal->idproyecto)}}">Cancelar</a>


                	</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
