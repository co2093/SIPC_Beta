@extends('layouts.default')
@section('content')


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
 @if($proyectos->idestadoproyecto == 1)
            <li class="breadcrumb-item"><a href="{{ route('projects.show') }}">Proyectos</a></li>
        @else
            <li class="breadcrumb-item"><a href="{{ route('archivados.show') }}">Proyectos antiguos</a></li>
        @endif        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $recurso->idproyecto)}}">Registro</a></li>
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
                        <div class="card mb-3">
                        <div class="card-body">


            <p><strong>Nombre: </strong>{{$recurso->nombrerecurso}}</p>
            <p><strong>Tipo: </strong>{{$recurso->nombretiporecurso}}</p>
            <p><strong>Unidad de medida: </strong>{{$recurso->nombreunidadmedida}}</p>
            <p><strong>Específicaciones técnicas: </strong>{{$recurso->especificacionestecnicas}}</p>
            <p><strong>Fuente de financiamiento: </strong>{{$recurso->descripcionfuente}}</p>
            <p><strong>Cantidad: </strong>{{$recurso->cantidadrecurso}}</p>
            <p><strong>Monto financiado: </strong> <span class="monto">{{$recurso->montofuente}}</span></p>
            <p><strong>Monto convocatoria: </strong> <span class="monto">{{$recurso->montoconvocatoria}}</span></p>
            <p><strong>Costo total: </strong> <span class="monto">{{$recurso->subtotalrecurso}}</span></p>

                
                    	
                    	</div>
                    </div>
<hr class="my-4">
                        <div class="alert alert-light" role="alert">
                            <strong>Nota:</strong> Todos los montos están expresados en dólares estadounidenses (USD).
                        </div>
                        <hr class="my-4">
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
