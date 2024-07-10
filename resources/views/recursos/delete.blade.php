@extends('layouts.default')
@section('content')


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $recurso->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $recurso->idproyecto)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('recursos.show', $recurso->idproyecto)}}">Recursos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Eliminar recurso</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Confirme la eliminición del recurso</h6>
                    </div>

                    <div class="card-body">
                    	
                    	<br>
                    	<label class="font-weight-bold">Tipo:&nbsp;</label>{{$recurso->nombretiporecurso}}
                
                    	<br>
                    	<label class="font-weight-bold">Nombre:&nbsp;</label>{{$recurso->nombrerecurso}}

                        <br>
                        <label class="font-weight-bold">Unidad:&nbsp;</label>{{$recurso->nombreunidadmedida}}
                
                       <br>
                        <label class="font-weight-bold">Específicaciones técnicas:&nbsp;</label>{{$recurso->especificacionestecnicas}}
                    

                        <br>
                        <label class="font-weight-bold">Fuente de financiamiento:&nbsp;</label>    
                        @if($recurso->descripcionfuente)
                        {{$recurso->descripcionfuente}}
                        @else
                        Convocatoria
                        @endif


                        <br>
                        <label class="font-weight-bold">Cantidad:&nbsp;</label>{{$recurso->cantidadrecurso}}

                        <br>
                        <label class="font-weight-bold">Precio:&nbsp;</label>${{$recurso->preciorecurso}}
                
                        <br>
                        <label class="font-weight-bold">Total:&nbsp;</label>${{$recurso->subtotalrecurso}}
                    	
                    	<br><br><br>

                  <form action="{{ route('recursos.destroy', $recurso->idrecurso) }}" method="POST" style="display:inline">
                    	@csrf
                    	@method('DELETE')
                    	<button class="btn btn-danger btn-md" type="submit">Borrar</button>
                      <a  class="btn btn-secondary float-right" href="{{route('recursos.show', $recurso->idproyecto)}}">Regresar</a>


                	</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
