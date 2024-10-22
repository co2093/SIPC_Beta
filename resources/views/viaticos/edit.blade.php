@extends('layouts.default')
@section('content')

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $viaje->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $viaje->idproyecto)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('viaticos.show', $viaje->idproyecto)}}">Viáticos Nacionales</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Editar viático</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Viajes locales</h6>
                    </div>

                    <div class="card-body">
                
             <form method="POST" action="{{ route('viaticos.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf



                    <div class="form-group">
                        <input type="hidden" value="{{$viaje->idproyecto}}" name="cod" >
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="{{$viaje->idpreviajelocal}}" name="idpreviajelocal" >
                    </div>


        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="actividad">Actividad asociada</label>
                <select class="form-control" name="actividad" required>
                    <option value="{{$viaje->idactividad}}">{{$viaje->nombreactividad}}</option>
                    @foreach($actividades as $a)
                    @if($a->idactividad != $viaje->idactividad)
                    <option value="{{$a->idactividad}}">{{$a->nombreactividad}}</option>
                    @endif    
                    @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="iddepartamento">Departamento</label>
                <select class="form-control" name="iddepartamento" required>
                    <option value="{{$viaje->iddepartamento}}">{{$viaje->departamento}}</option>
                  @foreach($departamentos as $d)
                  @if($viaje->iddepartamento != $d->iddepartamento)
                  <option value="{{ $d->iddepartamento }}">{{ $d->departamento }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
            </div>
          </div>

  <!-- Segunda fila -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="destino">Destino del viaje</label>
                <textarea class="form-control" name="destino" rows="2" placeholder="Dirección especifica del lugar" minlength="10" required>{{$viaje->destinoviaje}}</textarea>
              </div>
            </div>
          </div>

 <!-- Tercera fila -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="distancia">Distancia en KM a recorrer (ida+regreso)</label>
                <input type="number" class="form-control" name="distancia" min="1" step="1" value="{{$viaje->kmsarecorrer}}" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="vales">Cantidad de vales de combustible ($10 c/u)</label>
                <input type="number" class="form-control" name="vales" id="vales" min="0" step="1" value="{{$viaje->cantidadvalescombustible}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
              </div>
            </div>
          </div>


             <!-- Cuarta fila -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="salida">Hora de salida</label>
                <input type="time" class="form-control" name="salida" id="horaSalida" value="{{$viaje->horasalida}}" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="regreso">Hora de regreso</label>
                <input type="time" class="form-control" name="regreso" id="horaRegreso" value="{{$viaje->horallegada}}" required>
              </div>
            </div>
          </div>

          <!-- Quinta fila -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="dias">Cantidad de días</label>
                <input type="number" class="form-control" name="dias" id="dias" min="1" step="1" value="{{$viaje->cantidaddias}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="personas">Cantidad de personas</label>
                <input type="number" class="form-control" name="personas" id="personas"  min="1" step="1" value="{{$viaje->cantidadpersonas}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
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
                    <option value="{{$viaje->idfuente}}">{{$viaje->descripcionfuente}}</option>
                  @foreach($fuentes as $f)
                  @if($viaje->idfuente != $f->idfuente)
                  <option value="{{ $f->idfuente }}" data-financiamiento="{{ $f->financiamiento }}">
                    {{ $f->descripcionfuente }}. Disponible: ${{ $f->financiamiento }}
                  </option>
                  @endif
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="montofuente">Solicitado a fuente externa (USD)</label>
                <input type="number" class="form-control" name="montofuente" id="montofuente" placeholder="0.0" min="0.0" step="0.01" value="{{$viaje->montofuente}}"
                  onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
              </div>
            </div>
          </div>
          @endif

          <!-- Sexta fila -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="montoconvocatoria">Solicitado a SIC UES. Disponible: ${{$p->montoconvocatoria}}</label>
                <input type="number" class="form-control" name="montoconvocatoria" id="montoconvocatoria" min="0.0" step="0.01" value="{{$viaje->montoconvocatoria}}"
                  placeholder="0.0" max="" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="costoDiario">Costo diario: </label>
                <input type="text" class="form-control" id="costoDiario" name="costodiario" readonly>
              </div>
            </div>
          </div>

          <hr class="my-4">
          <label class="font-weight-bold">Total del viaje: <span id="costoViaje">0</span></label>


          <hr class="my-4">

                  <!-- Mensaje de advertencia -->
                  <label id="mensajeAdvertencia" class="text-danger" style="display: none;">
                      El monto solicitado debe ser menor o igual a los fondos disponibles.
                  </label>


					  <button type="submit" class="btn btn-danger">Guardar</button>
					   <a  class="btn btn-secondary float-right" href="{{route('viaticos.show', $viaje->idproyecto)}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>



<!-- Validación de tiempo -->
<script>
  document.getElementById('viaticoForm').addEventListener('submit', function(event) {
    const horaSalida = document.getElementById('horaSalida').value;
    const horaRegreso = document.getElementById('horaRegreso').value;

    if (horaSalida >= horaRegreso) {
      event.preventDefault();
      alert('La hora de salida debe ser menor que la hora de regreso.');
    }
  });
</script>


<!-- Script para calcular el costo -->
<script>
function calcularCostoDiario() {
  const horaSalida = document.getElementById('horaSalida').value;
  const horaRegreso = document.getElementById('horaRegreso').value;

  if (horaSalida && horaRegreso) {
    // Convertir horas a objetos Date
    const horaSalidaObj = new Date('1970-01-01T' + horaSalida + 'Z');
    const horaRegresoObj = new Date('1970-01-01T' + horaRegreso + 'Z');

    let costoDiario = 0;

    // Condición 1: Si la hora de salida es antes de las 7 AM
    const hora7AM = new Date('1970-01-01T07:00:00Z');
    if (horaSalidaObj < hora7AM) {
      costoDiario += 3;
    }

    // Condición 2: Si el periodo incluye las 12 PM
    const hora12PM = new Date('1970-01-01T12:00:00Z');
    if (horaSalidaObj < hora12PM && horaRegresoObj > hora12PM) {
      costoDiario += 4;
    }

    // Condición 3: Si el periodo incluye las 6 PM
    const hora6PM = new Date('1970-01-01T18:00:00Z');
    if (horaSalidaObj < hora6PM && horaRegresoObj > hora6PM) {
      costoDiario += 4;
    }

    // Mostrar el costo en el campo de costo diario
    document.getElementById('costoDiario').value = costoDiario;

    // Calcular el costo total del viaje
    calcularCostoViaje(costoDiario);
  }
}

function calcularCostoViaje(costoDiario) {
  const dias = parseInt(document.getElementById('dias').value) > 0 ? parseInt(document.getElementById('dias').value) : 1;
  const personas = parseInt(document.getElementById('personas').value) > 0 ? parseInt(document.getElementById('personas').value) : 1;
  const vales = parseInt(document.getElementById('vales').value) > 0 ? parseInt(document.getElementById('vales').value) : 0;

  // Costo total del viaje
  const costoTotalViaje = (dias * personas * costoDiario) + (vales * 10);

  // Mostrar el costo total en el label
  document.getElementById('costoViaje').textContent = costoTotalViaje;
}

// Escuchar los cambios en los inputs
document.getElementById('horaSalida').addEventListener('change', calcularCostoDiario);
document.getElementById('horaRegreso').addEventListener('change', calcularCostoDiario);
document.getElementById('dias').addEventListener('input', function() {
  calcularCostoViaje(parseFloat(document.getElementById('costoDiario').value) || 0);
});
document.getElementById('personas').addEventListener('input', function() {
  calcularCostoViaje(parseFloat(document.getElementById('costoDiario').value) || 0);
});
document.getElementById('vales').addEventListener('input', function() {
  calcularCostoViaje(parseFloat(document.getElementById('costoDiario').value) || 0);
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

<script type="text/javascript">
function validarMontos() {
  const montoConvocatoria = parseFloat(document.getElementById('montoconvocatoria').value) || 0;
  const montoFuente = parseFloat(document.getElementById('montofuente').value) || 0;
  const costoViaje = parseFloat(document.getElementById('costoViaje').textContent) || 0;
  
  // Sumar montos
  const sumaMontos = montoConvocatoria + montoFuente;

  // Comparar la suma con el costo del viaje
  if (sumaMontos >= costoViaje) {
    document.getElementById('submitButton').disabled = false; // Habilitar el botón
    document.getElementById('mensajeAdvertencia').style.display = 'none'; // Ocultar mensaje de advertencia
  } else {
    document.getElementById('submitButton').disabled = true; // Deshabilitar el botón
    document.getElementById('mensajeAdvertencia').style.display = 'block'; // Mostrar mensaje de advertencia
  }
}

// Añadir eventos para los inputs
document.getElementById('montoconvocatoria').addEventListener('input', validarMontos);
document.getElementById('montofuente').addEventListener('input', validarMontos);
document.getElementById('vales').addEventListener('input', validarMontos);
document.getElementById('dias').addEventListener('input', validarMontos);
document.getElementById('personas').addEventListener('input', validarMontos);

// También se debe recalcular el costo total del viaje en tiempo real
document.getElementById('horaSalida').addEventListener('change', calcularCostoDiario);
document.getElementById('horaRegreso').addEventListener('change', calcularCostoDiario);

</script>




@endsection
