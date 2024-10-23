@extends('layouts.default')
@section('content')




    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>

        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $cod)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{ route('actividades.show', $cod) }}">Actividades</a></li>
        <li class="breadcrumb-item active" aria-current="page">Crear actividad</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Definir actividades del proyecto de investigación</h6>
                    </div>

                    <div class="card-body">
               <form method="POST" action="{{ route('actividades.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Objetivo específico asociado</label>
                        <select class="form-control" name="objetivo" required>
                                                        <option value="" disabled selected>Seleccione una opción</option>

                        @foreach($obj as $o)
                            <option value="{{$o->idobjetivo}}">{{$o->descripcion}}</option>
                        @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="hidden" value="{{$cod}}" name="cod" >
                    </div>

                    <div class="form-group">
                    
                        <label for="exampleFormControlTextarea1">Actividad</label>
                        <textarea class="form-control" id="Descripcion corta" rows="3" name="actividad" required></textarea>
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de actividad</label>
                        <select class="form-control" name="tipo">
                        @foreach($tipo as $t)
                            <option value="{{$t->idtipoactividad}}">{{$t->nombretipoactividad}}</option>
                        @endforeach
                        </select>
                    </div>



                
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de inicio</label>
                        <input type="date" class="form-control" name="inicio" min="01/01/2024">
                    </div>

                  <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de finalización</label>
                        <input type="date" class="form-control" name="final" >
                    </div>

          <hr class="my-4">

                  <!-- Mensaje de advertencia -->
                  <label id="mensajeAdvertencia" class="text-danger" style="display: none;">
                     La fecha de inicio debe ser menor a la fecha de finalización.
                  </label>
<label id="mensajeAdvertenciaHoy" class="text-danger" style="display: none;">
    La fecha de inicio y la fecha de finalización no pueden ser anteriores al día de hoy.
</label>


                      <button type="submit" class="btn btn-danger">Guardar</button>
                    <a  class="btn btn-secondary float-right" href="{{route('actividades.show', $cod)}}">Regresar</a>

                    </form>

                    </div>
            </div>
        </div>                    
    </div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Obtener los elementos de fecha, el botón de guardar y los mensajes de advertencia
    const fechaInicioInput = document.querySelector('input[name="inicio"]');
    const fechaFinalInput = document.querySelector('input[name="final"]');
    const botonGuardar = document.querySelector('button[type="submit"]');
    const mensajeAdvertenciaFechas = document.getElementById('mensajeAdvertencia'); // Advertencia por fechas inválidas
    const mensajeAdvertenciaHoy = document.getElementById('mensajeAdvertenciaHoy'); // Advertencia por fechas menores al día de hoy

    // Función para obtener la fecha de hoy sin horas, minutos y segundos
    function obtenerFechaHoy() {
        const hoy = new Date();
        return new Date(hoy.getFullYear(), hoy.getMonth(), hoy.getDate());
    }

    // Función para verificar las fechas y habilitar/deshabilitar el botón
    function verificarFechas() {
        const fechaHoy = obtenerFechaHoy();
        const fechaInicio = new Date(fechaInicioInput.value);
        const fechaFinal = new Date(fechaFinalInput.value);

        // Ocultar mensajes por defecto
        mensajeAdvertenciaFechas.style.display = 'none';
        mensajeAdvertenciaHoy.style.display = 'none';

        // Verificar si las fechas son válidas y mayores o iguales al día de hoy
        if (fechaInicio < fechaHoy || fechaFinal < fechaHoy) {
            // Mostrar advertencia si alguna fecha es menor al día de hoy
            mensajeAdvertenciaHoy.style.display = 'block';
            botonGuardar.disabled = true;
        } else if (fechaInicio >= fechaFinal) {
            // Mostrar advertencia si la fecha de inicio no es menor a la de finalización
            mensajeAdvertenciaFechas.style.display = 'block';
            botonGuardar.disabled = true;
        } else {
            // Si ambas condiciones se cumplen, habilitar el botón
            botonGuardar.disabled = false;
        }
    }

    // Deshabilitar el botón inicialmente
    botonGuardar.disabled = true;

    // Ocultar los mensajes de advertencia inicialmente
    mensajeAdvertenciaFechas.style.display = 'none';
    mensajeAdvertenciaHoy.style.display = 'none';

    // Agregar event listeners para verificar las fechas cuando cambien
    fechaInicioInput.addEventListener('input', verificarFechas);
    fechaFinalInput.addEventListener('input', verificarFechas);
});
</script>


@endsection
