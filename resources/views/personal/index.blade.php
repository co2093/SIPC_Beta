@extends('layouts.default')
@section('content')



	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $cod)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $cod)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('personal.show', $cod)}}">Contrataciones</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Registrar personal</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Registrar contratación de personal de investigación</h6>
                    </div>

                    <div class="card-body">
                
                    <form method="POST" action="{{ route('personal.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf


                    <div class="form-group">
                        <input type="hidden" value="{{$cod}}" name="cod" >
                    </div>
              <div class="form-group">
                <label for="actividad">Actividad asociada</label>
                <select class="form-control" name="actividad" required>
                  <option value="" disabled selected>Seleccione una actividad</option>
                  @foreach($actividades as $a)
                  <option value="{{ $a->idactividad }}">{{ $a->nombreactividad }}</option>
                  @endforeach
                </select>
              </div>

          <!-- Primera fila -->
          <div class="row">
            <div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo de personal</label>
					    <select class="form-control" name="tipo" required>
					    	 <option value="" disabled selected>Seleccione una opción</option>
					    	@foreach($tipo as $t)
					    		<option value="{{$t->idtipocontratacion}}">{{$t->nombretipocontratacion}}</option>
					    	@endforeach
					    </select>
					  </div>
            </div>

            <div class="col-md-6">
				  
					  <div class="form-group">
					    <label for="exampleFormControlInput1">Horas laborales</label>
					    <input type="number" class="form-control" id="dias" name="dias" min="1" step="1" 
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
					    placeholder="0" required>
					  </div>
            </div>
          </div>
					

 <!-- Fuente de financiamiento (Si aplica) -->
          @if($fuentes)
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="idfuente">Fuente de financiamiento</label>
                <select class="form-control" name="idfuente" id="idfuente">
                  <option value="" disabled selected>Seleccione una fuente de financiamiento</option>
                  @foreach($fuentes as $f)
                  <option value="{{ $f->idfuente }}" data-financiamiento="{{ $f->financiamiento }}">
                    {{ $f->descripcionfuente }}. Disponible: ${{ $f->financiamiento }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="montofuente">Solicitado a fuente externa (USD)</label>
                <input type="number" class="form-control" name="montofuente" id="montofuente" placeholder="0.0" min="0.0" step="0.01" value="0.0"
                  onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
              </div>
            </div>
          </div>
          @endif
 		



        <!-- Sexta fila -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="montoconvocatoria">Solicitado a SIC UES. Disponible: ${{$p->montoconvocatoria}} </label>
                <input type="number" class="form-control" name="montoconvocatoria" id="montoconvocatoria" min="0.0" step="0.01" value="0.0"
                  placeholder="0.0" max="" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="costoDiario">Costo total: </label>
                <input type="text" class="form-control" id="costototal" name="costototal" readonly>
              </div>
            </div>
          </div>

          <hr class="my-4">


					  <button type="submit" class="btn btn-danger">Guardar</button>
					  <a  class="btn btn-secondary float-right" href="{{route('personal.show', $cod)}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Obtener los inputs de montofuente, montoconvocatoria y costototal
    const montofuenteInput = document.getElementById('montofuente');
    const montoconvocatoriaInput = document.getElementById('montoconvocatoria');
    const costototalInput = document.getElementById('costototal');

    // Función para actualizar el costo total
    function actualizarCostoTotal() {
        // Obtener los valores de montofuente y montoconvocatoria
        const montofuente = parseFloat(montofuenteInput.value) || 0;
        const montoconvocatoria = parseFloat(montoconvocatoriaInput.value) || 0;

        // Calcular el total
        const total = montofuente + montoconvocatoria;

        // Actualizar el input de costototal
        costototalInput.value = total.toFixed(2); // Asegurar que el total tenga dos decimales
    }

    // Escuchar los cambios en los inputs de montofuente y montoconvocatoria
    montofuenteInput.addEventListener('input', actualizarCostoTotal);
    montoconvocatoriaInput.addEventListener('input', actualizarCostoTotal);

    // Llamar a la función para inicializar el valor al cargar la página
    actualizarCostoTotal();
});
</script>

<script>
    const inputNumero = document.getElementById('montoconvocatoria');

    inputNumero.addEventListener('input', function() {
      let valor = parseInt(inputNumero.value);

      // Si el valor está fuera del rango, se ajusta
      if (valor > {{$p->montoconvocatoria}}) {
        inputNumero.value = {{$p->montoconvocatoria}};
      }
    });
  </script>


<!-- Script para ajustar el valor máximo de montofuente según el select -->
<script>
    // Obtener los elementos del select y el input
    const selectFuente = document.getElementById('idfuente');
    const inputMontofuente = document.getElementById('montofuente');

    // Función para actualizar el valor máximo del input montofuente según el select
    function actualizarMaximo() {
        const selectedOption = selectFuente.options[selectFuente.selectedIndex]; // Obtener opción seleccionada
        const financiamiento = selectedOption.getAttribute('data-financiamiento'); // Obtener valor de financiamiento

        // Si el select tiene un valor válido (diferente del placeholder inicial)
        if (selectFuente.value) {
            inputMontofuente.disabled = false; // Habilitar input
            inputMontofuente.max = financiamiento; // Establecer el valor máximo en el input
        } else {
            inputMontofuente.disabled = true; // Deshabilitar input si no hay opción válida
            inputMontofuente.value = ''; // Restablecer el valor del input
        }
    }

    // Evento que se activa cada vez que se cambia el select
    selectFuente.addEventListener('change', actualizarMaximo);

    // Listener para ajustar el valor del input si excede el máximo permitido
    inputMontofuente.addEventListener('input', function() {
        if (parseFloat(inputMontofuente.value) > parseFloat(inputMontofuente.max)) {
            inputMontofuente.value = inputMontofuente.max; // Ajustar al valor máximo
        }
    });

    // Inicialmente deshabilitar el input hasta que se seleccione una opción en el select
    inputMontofuente.disabled = true;
</script>

@endsection
