@extends('layouts.default')
@section('content')

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $publicacion->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $publicacion->idproyecto)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('publicaciones.show', $publicacion->idproyecto)}}">Publicaciones</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar publicación</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Editar publicación</h6>
                    </div>

                    <div class="card-body">
                
        <form method="POST" action="{{ route('publicaciones.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf


                    <div class="form-group">
                        <input type="hidden" value="{{$publicacion->idproyecto}}" name="cod" >
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="{{$publicacion->idpublicacion}}" name="idpublicacion" >
                    </div>

          <div class="row">
            <div class="col-md-6">
                 <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de publicación</label>
                        <select class="form-control" name="idtipo" required>
                    <option value="{{$publicacion->idtipopublicacion}}">{{$publicacion->nombretipopublicacion}}</option>

                        @foreach($tipos as $t)
                        @if($publicacion->idtipopublicacion != $t->idtipopublicacion)

                        <option value="{{$t->idtipopublicacion}}">{{$t->nombretipopublicacion}}</option>
                        @endif

                        @endforeach

                        </select>
                  </div>
              </div>
                <div class="col-md-6">
                 <div class="form-group">
                        <label for="exampleFormControlSelect1">Nivel de publicación</label>
                        <select class="form-control" name="nivel" required>
                <option value="{{ $publicacion->nivel }}">{{ $publicacion->nivel }}</option>
                @if($publicacion->nivel == "Nacional")
                    <option value="Internacional">Internacional</option>
                @else
                    <option value="Nacional">Nacional</option>
                @endif
                </select>

                  </div>
              </div>
          </div>


                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Detalle publicación</label>
                        <textarea class="form-control" name="detalle" rows="2" required>{{$publicacion->detallepublicacion}}</textarea>
                      </div>



  <!-- Fuente de financiamiento (Si aplica) -->
          @if($fuentes)
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="idfuente">Fuente de financiamiento</label>
                <select class="form-control" name="idfuente" id="idfuente">
                    <option value="{{$publicacion->idfuente}}">{{$publicacion->descripcionfuente}}</option>
                  @foreach($fuentes as $f)
                  @if($publicacion->idfuente != $f->idfuente)
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
                <label for="montofuente">Monto solicitado a fuente externa</label>
                <input type="number" class="form-control" name="montofuente" id="montofuente" placeholder="0.0" min="0.0" step="0.01" value="{{$publicacion->montofuente}}"
                  onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
              </div>
            </div>
          </div>
          @endif


        <!-- Sexta fila -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="montoconvocatoria">Monto solicitado a SIC UES. Disponible: ${{$p->montoconvocatoria}} </label>
                <input type="number" class="form-control" name="montoconvocatoria" id="montoconvocatoria" min="0.0" step="0.01" value="{{$publicacion->montoconvocatoria}}"
                  placeholder="0.0" max="" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="costoDiario">Costo total</label>
                <input type="text" class="form-control" id="costototal" name="costototal" readonly>
              </div>
            </div>
          </div>

                        <hr class="my-4">
                        <div class="alert alert-light" role="alert">
                            <strong>Nota:</strong> Todos los montos deben estar expresados en dólares estadounidenses (USD).
                        </div>
                        <hr class="my-4">




                      <button type="submit" class="btn btn-danger">Guardar</button>
                       <a  class="btn btn-secondary float-right" href="{{route('publicaciones.show', $publicacion->idproyecto)}}">Regresar</a>


                    </form>

                    </div>
            </div>
        </div>                    
    </div>




<script>
    // Seleccionamos los elementos por su ID
    const montofuenteInput = document.getElementById('montofuente');
    const montoconvocatoriaInput = document.getElementById('montoconvocatoria');
    const costototalInput = document.getElementById('costototal');

    // Función para actualizar el costo total
    function actualizarCostoTotal() {
        // Convertimos los valores de los campos a números flotantes
        const montofuente = parseFloat(montofuenteInput.value) || 0;
        const montoconvocatoria = parseFloat(montoconvocatoriaInput.value) || 0;
        
        // Calculamos la suma
        const costototal = montofuente + montoconvocatoria;
        
        // Mostramos el resultado en el campo de costo total
        costototalInput.value = costototal.toFixed(2);
    }

    // Añadimos un event listener para detectar cambios en los campos de entrada
    montofuenteInput.addEventListener('input', actualizarCostoTotal);
    montoconvocatoriaInput.addEventListener('input', actualizarCostoTotal);

    // Llamamos a la función al cargar para que se muestre el valor inicial
    actualizarCostoTotal();
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
