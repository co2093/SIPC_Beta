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
                     <div class="card mb-3">
                        <div class="card-body">	

            <p><strong>Actividad asociada: </strong>{{$personal->nombreactividad}}</p>
            <p><strong>Tipo de contratación: </strong>{{$personal->nombretipocontratacion}}</p>
            <p><strong>Horas laborales: </strong>{{$personal->dias}}</p>
            <p><strong>Fuente de financiamiento: </strong>{{$personal->descripcionfuente}}</p>

            <p><strong>Monto financiado: </strong> <span class="monto">{{$personal->montofuente}}</span></p>
            <p><strong>Monto convocatoria: </strong> <span class="monto">{{$personal->montoconvocatoria}}</span></p>

            <p><strong>Total: </strong> <span class="monto">{{$personal->total}}</span></p>

            

                    </div></div>
<hr class="my-4">
                        <div class="alert alert-light" role="alert">
                            <strong>Nota:</strong> Todos los montos están expresados en dólares estadounidenses (USD).
                        </div>
                        <hr class="my-4">
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
