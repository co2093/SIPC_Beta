@extends('layouts.default')
@section('content')



	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $viaje->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $viaje->idproyecto)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('viaticos.int.show', $viaje->idproyecto)}}">Viáticos Internacionales</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Editar viático internacional</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Editar detalles del viaje internacional</h6>
                    </div>


                    <div class="card-body">
                
             <form method="POST" action="{{ route('viaticos.int.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf


 				<div class="form-group">
                        <input type="hidden" value="{{$viaje->idproyecto}}" name="cod" >
                    </div>


                    <div class="form-group">
                        <input type="hidden" value="{{$viaje->idpreviajeexterior}}" name="idpreviajeexterior" >
                    </div>


  							<div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Actividad asociada</label>
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
                                    <label for="exampleFormControlSelect1">País y viático por día</label>
                                    <select class="form-control" name="pais" id="pais" required>
														<option value="{{$pais->idpais}}" data-costo="{{ $pais->costo }}">
                                                {{$pais->nombrepais}},  $ {{$pais->costo}}
                                          </option>
                                        @foreach($paises as $pa)
                                        @if($pa->idpais != $pais->idpais)
                                            <option value="{{$pa->idpais}}" data-costo="{{ $pa->costo }}">
                                                {{$pa->nombrepais}},  $ {{$pa->costo}}
                                            </option>
                                        @endif   
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Destino del viaje</label>
                                    <textarea class="form-control" minlength="10" name="destino" rows="2" required>
                                    	{{$viaje->destinoviaje}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Costo del boleto aéreo (USD)</label>
                                    <input type="number" class="form-control" name="costoboleto" id="costoboleto" min="0" step="0.1"
                                    value="{{$viaje->costoboleto}}"
                                        onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Costo de la inscripción (USD)</label>
                                    <input type="number" class="form-control" name="costoinscripcion" id="costoinscripcion"  min="0" step="0.1" value="{{$viaje->inscripcionevento}}" 
                                        onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Número de personas</label>
                                    <input type="number" class="form-control" name="numeropersonas"  min="1" step="1"  
                                    id="personas" value="{{$viaje->cantidadpersonas}}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Número de días</label>
                                    <input type="number" class="form-control" name="numerodias"  min="1" step="1" value="1" 
                                    id="numerodias" 					    value="{{$viaje->numerodias}}"              
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Solicitado a SIC UES. Disponible: ${{$p->montoconvocatoria}}</label>
                            <input type="number" class="form-control" name="montoconvocatoria" id="montoconvocatoria" min="0.0" step="0.01" value="{{$viaje->montoconvocatoria}}" max="{{$disponibleconv}}"
                                placeholder="0.0"  onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
                                </div>
                            </div>
                        </div>

                        @if($fuentes)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Fuente de financiamiento</label>
                                        <select class="form-control" name="idfuente" id="idfuente">
                                        	@if($fuente)
                                        	  <option value="{{$viaje->idfuente}}" data-financiamiento="{{ $disponiblefuente }}">
                                        	  	{{$viaje->descripcionfuente}}. Disponible: ${{$disponiblefuente}}</option>
                                        	@endif 	
                                            @foreach($fuentes as $f)
                                            @if($f->idfuente != $viaje->idfuente)
                                                <option value="{{$f->idfuente}}" data-financiamiento="{{ $f->financiamiento }}">
                                                	{{$f->descripcionfuente}}. Disponible: ${{$f->financiamiento}}</option>
                                             @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Solicitado a fuente externa (USD)</label>
                                        <input type="number" class="form-control" name="montofuente" id="montofuente" placeholder="0.0" min="0.0" step="0.01" value="{{$viaje->montofuente}}" max="{{$disponiblefuente}}" 
                                            onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)"  required>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <hr class="my-4">

                        <label class="font-weight-bold">Total del viaje: <span id="costoPais">{{$viaje->totalplanviajeext}}</span></label>

								<hr class="my-4">

								<label id="mensajeAdvertencia" class="text-danger" style="display: none;">
									    El monto solicitado debe ser menor o igual a los fondos disponibles.
									</label>

									<!-- Botón de submit -->
									<button type="submit" class="btn btn-danger" id="submitButton" disabled>Guardar</button>

					 <a  class="btn btn-secondary float-right" href="{{route('viaticos.int.show', $viaje->idproyecto)}}">Regresar</a>


                   


					</form>

                    </div>
            </div>
        </div>                    
    </div>

<script>
    // Obtener el select, el label y los inputs
    const selectPais = document.getElementById('pais');
    const costoPais = document.getElementById('costoPais');
    const inputCostoBoleto = document.querySelector('input[name="costoboleto"]'); // Input de costo de boleto
    const inputCostoInscripcion = document.getElementById('costoinscripcion'); // Input de costo de inscripción
    const inputNumeroPersonas = document.querySelector('input[name="numeropersonas"]'); // Input de número de personas
    const inputNumeroDias = document.querySelector('input[name="numerodias"]'); // Input de número de días

    function actualizarInfoPais() {
        const selectedOption = selectPais.options[selectPais.selectedIndex]; // Opción seleccionada
        // Obtener el costo de la opción seleccionada
        const costo = parseFloat(selectedOption.dataset.costo) || 0; // Asegurarse de que sea un número

        // Obtener los valores de los inputs
        const costoBoleto = parseFloat(inputCostoBoleto.value) || 0; // Asegurarse de que sea un número
        const costoInscripcion = parseFloat(inputCostoInscripcion.value) || 0; // Asegurarse de que sea un número
        const numeroPersonas = parseInt(inputNumeroPersonas.value) || 0; // Asegurarse de que sea un número entero
        const numeroDias = parseInt(inputNumeroDias.value) || 0; // Asegurarse de que sea un número entero

        // Calcular la suma total
        const totalCosto = (costoBoleto * numeroPersonas) + (costoInscripcion * numeroPersonas) +  (costo * numeroPersonas * numeroDias) ;

        // Actualizar el contenido del label con el total
        costoPais.textContent = totalCosto.toFixed(2); // Mostrar dos decimales
    }

    // Agregar eventos para detectar cambios
    selectPais.addEventListener('change', actualizarInfoPais);
    inputCostoBoleto.addEventListener('input', actualizarInfoPais);
    inputCostoInscripcion.addEventListener('input', actualizarInfoPais);
    inputNumeroPersonas.addEventListener('input', actualizarInfoPais);
    inputNumeroDias.addEventListener('input', actualizarInfoPais);
</script>


<script type="text/javascript">

// Obtener los elementos necesarios
const inputMontoConvocatoria = document.getElementById('montoconvocatoria');
const inputMontoFuente = document.getElementById('montofuente');
const botonSubmit = document.getElementById('submitButton');
const mensajeAdvertencia = document.getElementById('mensajeAdvertencia');  // Label de advertencia

// Función para habilitar/deshabilitar el botón de submit y mostrar/ocultar el mensaje
function verificarCondicion() {
    // Obtener los valores de montofuente y montoconvocatoria
    const montoConvocatoria = parseFloat(inputMontoConvocatoria.value) || 0;
    const montoFuente = parseFloat(inputMontoFuente.value) || 0;

    // Obtener el total calculado
    const totalCosto = parseFloat(costoPais.textContent) || 0;

    // Verificar si la suma es mayor o igual al totalCosto
    if ((montoConvocatoria + montoFuente) >= totalCosto) {
        botonSubmit.disabled = false;  // Habilitar el botón
        mensajeAdvertencia.style.display = 'none';  // Ocultar el mensaje de advertencia
    } else {
        botonSubmit.disabled = true;   // Deshabilitar el botón
        mensajeAdvertencia.style.display = 'block'; // Mostrar el mensaje de advertencia
    }
}

// Llamar a la función verificarCondicion cuando los valores cambian
inputMontoConvocatoria.addEventListener('input', verificarCondicion);
inputMontoFuente.addEventListener('input', verificarCondicion);

// También se debe verificar cuando se actualizan los valores que afectan a `totalCosto`
selectPais.addEventListener('change', function() {
    actualizarInfoPais();
    verificarCondicion();
});
inputCostoBoleto.addEventListener('input', function() {
    actualizarInfoPais();
    verificarCondicion();
});
inputCostoInscripcion.addEventListener('input', function() {
    actualizarInfoPais();
    verificarCondicion();
});
inputNumeroPersonas.addEventListener('input', function() {
    actualizarInfoPais();
    verificarCondicion();
});
inputNumeroDias.addEventListener('input', function() {
    actualizarInfoPais();
    verificarCondicion();
});


</script>



@endsection
