@extends('layouts.default')
@section('content')

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
 @if($proyectos->idestadoproyecto == 1)
            <li class="breadcrumb-item"><a href="{{ route('projects.show') }}">Proyectos</a></li>
        @else
            <li class="breadcrumb-item"><a href="{{ route('archivados.show') }}">Proyectos antiguos</a></li>
        @endif        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $fuente->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $fuente->idproyecto)}}">Presupuesto</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('fuentes.show', $fuente->idproyecto) }}">Financiamientos</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Editar fuente de financiamiento</li>
	  </ol>
	</nav>

     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Editar fuente de financiamiento</h6>
                    </div>

                    <div class="card-body">




                
                    <form method="POST" action="{{ route('fuentes.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf

                  <div class="form-group">
                       <input type="hidden" value="{{$fuente->idproyecto}}" name="cod" >
                  </div>

                     <div class="form-group">
                       <input type="hidden" value="{{$fuente->idfuente}}" name="idfuente" >
                  </div>

                  <div class="form-group">
                       <input type="hidden" value="{{$fuente->financiamiento}}" name="anterior" >
                  </div>

  					<div class="form-group">
					    <label for="exampleFormControlInput1">Nombre de la institución</label>
					    <input type="text" class="form-control" name="descripcion" placeholder="Nombre" value="{{$fuente->descripcionfuente}}" required>
					  </div>

					 
				<div class="form-group">
				    <label for="exampleFormControlSelect1">Tipo</label>
				    <select class="form-control" name="externa" id="tipoSelect" required>
				        <option value="Cooperacion externa internacional" 
				            {{ $fuente->tipo == 'Cooperacion externa internacional' ? 'selected' : '' }}>
				            Cooperacion externa internacional
				        </option>
				        <option value="Fuentes nacionales externas a la UES" 
				            {{ $fuente->tipo == 'Fuentes nacionales externas a la UES' ? 'selected' : '' }}>
				            Fuentes nacionales externas a la UES
				        </option>
				        <option value="Fuentes nacionales internas de la UES" 
				            {{ $fuente->tipo == 'Fuentes nacionales internas de la UES' ? 'selected' : '' }}>
				            Fuentes nacionales internas de la UES
				        </option>
				    </select>
				</div>


					<div class="form-group">
					    <label for="exampleFormControlSelect1">Facultad</label>
					    <select class="form-control" name="facultad" id="facultadSelect" disabled>
					        <option value="{{$fuente->idfacultad}}">{{$fuente->nombrefacultad}}</option>
					        @foreach($facultades as $i)
					        @if($i->idfacultad != $fuente->idfacultad)
					            <option value="{{ $i->idfacultad }}">{{ $i->nombrefacultad }}</option>
					        @endif
					        @endforeach
					    </select>
					</div>


				  	<div class="form-group">
					    <label for="exampleFormControlSelect1">Rubro</label>
					    <select class="form-control" name="rubro" required>
					    	<option value="{{$fuente->idrubro}}">{{$fuente->rubro}}</option>
					    	@foreach($rubros as $r)
					    	@if($fuente->idrubro != $r->idrubro)
					    		<option value="{{$r->idrubro}}">{{$r->rubro}}</option>
					    	@endif	
					    	@endforeach
					    </select>
					  </div>



					 <div class="form-group">
					    <label for="exampleFormControlInput1">Monto a financiar</label>
					    <input type="number" class="form-control" name="financiamiento" placeholder="" min="1"                   
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{$fuente->financiamiento}}" required>
					 </div>

					    <hr class="my-4">
                        <div class="alert alert-light" role="alert">
                            <strong>Nota:</strong> Todos los montos deben estar expresados en dólares estadounidenses (USD).
                        </div>
                        <hr class="my-4">

					  <button type="submit" class="btn btn-danger">Guardar</button>
					   <a  class="btn btn-secondary float-right" href="{{route('fuentes.show', $fuente->idproyecto)}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>


<script>
    document.getElementById('tipoSelect').addEventListener('change', function() {
        const facultadSelect = document.getElementById('facultadSelect');
        // Habilita solo si se selecciona "Fuentes nacionales internas de la UES"
        if (this.value === 'Fuentes nacionales internas de la UES') {
            facultadSelect.disabled = false;
        } else {
            facultadSelect.disabled = true;
        }
    });

    // Inicializar el estado del select de facultad al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
        const tipoSelect = document.getElementById('tipoSelect');
        const facultadSelect = document.getElementById('facultadSelect');
        if (tipoSelect.value === 'Fuentes nacionales internas de la UES') {
            facultadSelect.disabled = false;
        }
    });
</script>



@endsection
