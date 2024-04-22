@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<h1 style="text-align: center;">Registro de Investigadores</h1>

<form action="/investigadores" method="post" style="margin: 25px;">
  <style>
    .invalid-feedback {
      display: block;
      width: 100%;
      margin-top: .25rem;
      font-size: .875rem;
      color: #dc3545;
    }

    /* Estilos del tooltip */
    .tooltip-text {
      visibility: hidden;
      width: auto;
      max-width: 200px;
      /* Ancho máximo del tooltip */
      background-color: rgba(0, 0, 0, 0.8);
      /* Color de fondo con transparencia */
      color: #fff;
      /* Color del texto */
      text-align: center;
      border-radius: 8px;
      /* Bordes blueondeados */
      padding: 8px 12px;
      /* Espaciado interno */
      position: absolute;
      z-index: 1;
      bottom: calc(100% + 8px);
      /* Posiciona el tooltip debajo del ícono */
      left: 50%;
      transform: translateX(-50%);
      /* Centra el tooltip horizontalmente */
      opacity: 0;
      transition: opacity 0.3s, visibility 0.3s;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
      /* Sombra suave */
    }

    /* Estilos del ícono de pregunta */
    .tooltip-icon {
      cursor: help;
      /* Cambia el cursor al pasar el mouse sobre el tooltip */
    }

    /* Muestra el tooltip cuando el mouse está sobre el ícono */
    .tooltip-wrapper:hover .tooltip-text {
      visibility: visible;
      opacity: 1;
    }
  </style>
  <script>
    // Obtener todos los elementos con el atributo data-tooltip
    var tooltips = document.querySelectorAll('[data-tooltip]');

    // Iterar sobre cada elemento y agregar eventos de mouse
    tooltips.forEach(function(tooltip) {
      // Obtener el contenido del tooltip
      var tooltipText = tooltip.getAttribute('data-tooltip');

      // Crear el elemento del tooltip
      var tooltipElement = document.createElement('span');
      tooltipElement.classList.add('tooltiptext');
      tooltipElement.textContent = tooltipText;

      // Adjuntar el tooltip al elemento padre
      tooltip.appendChild(tooltipElement);
    });
  </script>

  @csrf
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="true">Datos Personales</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="academic-tab" data-bs-toggle="tab" data-bs-target="#academic" type="button" role="tab" aria-controls="academic" aria-selected="false">Datos Acad&eacute;micos</button>
    </li>
  </ul>

  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <!--Datos Personales-->
      <div class="tab-pane fade show active mt-5" id="personal" role="tabpanel" aria-labelledby="personal-tab">
        <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
          <label for="nombre_persona" class="form-label me-3 mr-3">Nombres</label>
          <span class="mr-5" data-bs-toggle="tooltip" title="Debe ingresarse el nombre del Investigador">
            <i class="bi bi-info-circle text-info"></i>
          </span>
          <input type="text" class="form-control  @error('nombre_persona') is-invalid @enderror" tabindex="1" id="nombre_persona" name="nombre_persona" placeholder="{{ $errors->has('nombre_persona') ? $errors->first('nombre_persona') : 'Ingrese el nombre' }}" value="{{ old('nombre_persona') }}">
          <label for="apellido_persona" class="form-label me-3 ml-5">Apellidos</label>
          <span class="mr-5 ml-3" data-bs-toggle="tooltip" title="Debe ingresarse el apellido del Investigador">
            <i class="bi bi-info-circle text-info"></i>
          </span>
          <input type="text" class="form-control  @error('apellido_persona') is-invalid @enderror" tabindex="2" id="apellido_persona" name="apellido_persona" placeholder="{{ $errors->has('apellido_persona') ? $errors->first('apellido_persona') : 'Ingrese Apellidos' }}" value="{{ old('apellido_persona') }}">
        </div>
        <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
          <label for="correo_persona" class="form-label me-3 ">Correo Electr&oacute;nico</label>
          <span class="mr-3" data-bs-toggle="tooltip" title="Debe ingresarse el correo electrónico del Investigador">
            <i class="bi bi-info-circle text-info"></i>
          </span>
          <input type="email" class="form-control  @error('correo_persona') is-invalid @enderror" tabindex="3" name="correo_persona" id="correo_persona" placeholder="{{ $errors->has('correo_persona') ? $errors->first('correo_persona') : 'Ingrese el Correo Electrónico' }}" value="{{ old('correo_persona') }}">
        </div>
        <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
          <label for="telefono_persona" class="form-label">Tel&eacute;fono</label>
          <span class="ml-3 mr-5" data-bs-toggle="tooltip" title="Debe ingresarse el número de teléfono del Investigador">
            <i class="bi bi-info-circle text-info"></i>
          </span>
          <input type="text" class="form-control  @error('telefono_persona') is-invalid @enderror" tabindex="4" id="telefono_persona" name="telefono_persona" placeholder="{{ $errors->has('telefono_persona') ? $errors->first('telefono_persona') : 'Ingrese Telefono' }}" value="{{ old('telefono_persona') }}">
          <label for="edad_persona" class="form-label me-3 ml-5 ">Edad</label>
          <span class="mr-5 ml-5" data-bs-toggle="tooltip" title="Debe ingresarse la edad del Investigador">
            <i class="bi bi-info-circle text-info"></i>
          </span>
          <input type="number" class="form-control @error('edad_persona') is-invalid @enderror" tabindex="5" id="edad_persona" name="edad_persona" placeholder="{{ $errors->has('edad_persona') ? $errors->first('edad_persona') : 'Ingrese la edad' }}" value="{{ old('edad_persona') }}">
        </div>
        <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
          <label for="direccion_persona" class="form-label mr-2">Direcci&oacute;n</label>
          <span class="mr-4 ml-4" data-bs-toggle="tooltip" title="Debe ingresarse la dirección del Investigador">
            <i class="bi bi-info-circle text-info"></i>
          </span>
          <input type="text" class="form-control  @error('direccion_persona') is-invalid @enderror" tabindex="6" name="direccion_persona" id="direccion_persona" placeholder="{{ $errors->has('direccion_persona') ? $errors->first('direccion_persona') : 'Ingrese lugar de residencia del Investigador' }}" value="{{ old('direccion_persona') }}">
        </div>
        <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
          <label for="id_pais" class="form-label me-3 mr-5">País</label>
          <span class="mr-4" data-bs-toggle="tooltip" title="Debe seleccionarse el país del Investigador">
            <i class="bi bi-info-circle text-info"></i>
          </span>
          <select class="form-control  ml-4 @error('id_pais') is-invalid @enderror" tabindex="7" name="id_pais" id="id_pais">
            <option selected>Seleccione Pais</option>
            @foreach ($paises as $pais)
            <option value="{{ $pais->id_pais }}">{{ $pais->nombre_pais }}</option>
            @endforeach
          </select>

        </div>
        <div class="d-flex justify-content-between" style="margin-bottom: 25px;">
          <label for="genero_persona" class="form-label me-3">Sexo <span class="ml-3" data-bs-toggle="tooltip" title="Debe seleccionar genero del Investigador">
              <i class="bi bi-info-circle text-info"></i>
            </span></label>
          <div class="form-check">
            <input class="form-check-input me-3" type="radio" name="genero_persona" id="genero_masculino" value="true">
            <label class="form-check-label" for="genero_masculino" style="margin-right: 10px;">Masculino</label>
          </div>
          <div class="form-check">
            <input class="form-check-input me-3" type="radio" name="genero_persona" id="genero_femenino" value="false">
            <label class="form-check-label" for="genero_femenino">Femenino</label>
          </div>
        </div>
      </div>
      <!--Datos Academicos-->
      <div class="tab-pane fade mt-5" id="academic" role="tabpanel" aria-labelledby="academic-tab">
        <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
          <label for="id_g_acad" class="form-label me-3 ">M&aacute;ximo Grado Acad&eacute;mico
          </label>
          <span class="ml-3" data-bs-toggle="tooltip" title="Debe seleccionar el maximo grado academico del Investigador">
            <i class="bi bi-info-circle text-info"></i>
          </span>
          <select class="form-control  ml-4 @error('id_g_acad') is-invalid @enderror" tabindex="4" name="id_g_acad" id="id_g_acad">
            <option selected>Seleccione un Grado Acad&eacute;mico</option>
            @foreach ( $grados_academicos as $grado_academico)
            <option value="{{$grado_academico->id_g_acad}}">{{$grado_academico->titulo_g_acad}}</option>
            @endforeach
          </select>
          <label for="id_carrera" class="form-label me-3">Carrera seg&uacute;n T&iacute;tulo</label>
          <span class="ml-3" data-bs-toggle="tooltip" title="Debe seleccionar la carrera segun el titulo del Investigador">
            <i class="bi bi-info-circle text-info"></i>
          </span>
          <select class="form-control  ml-5 @error('id_carrera') is-invalid @enderror" tabindex="5" name="id_carrera" id="id_carrera">
            <option selected>Seleccione una Carrera</option>
            @foreach ($carreras as $carrera)
            <option value="{{$carrera->id_carrera}}">{{$carrera->nombre_carrera}}</option>
            @endforeach
          </select>
        </div>
        <div class="d-flex justify-content-between" style="margin-bottom: 25px;">
          <label for="id_cap" class="form-label me-3 mr-2">Capacitaciones</label>
          <span data-bs-toggle="tooltip" title="Debe seleccionar el tipo de capacitacion ">
            <i class="bi bi-info-circle text-info"></i>
          </span>
          <select class="form-control ml-2 @error('id_cap') is-invalid @enderror" tabindex="5" name="id_cap" id="id_cap">
            <option selected>Seleccione una</option>
            @foreach ($capacitaciones as $capacitacion)
            <option value="{{$capacitacion->id_cap}}">{{$capacitacion->nombre_capacitacion}}</option>
            @endforeach
          </select>
        </div>
        <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
          <label for="id_unidad" class="form-label me-3 mr-2 ">Unidad a la que pertenece</label>
          <span class="ml-3" data-bs-toggle="tooltip" title="Debe seleccionar la unidad investiativa a la que pertenece el Investigador">
            <i class="bi bi-info-circle text-info"></i>
          </span>
          <select class="form-control  ml-4 @error('id_unidad') is-invalid @enderror" tabindex="5" name="id_unidad" id="id_unidad">
            <option selected>Seleccione la Unidad</option>
            @foreach ($unidades as $unidad)
            <option value="{{$unidad->id_unidad}}">{{$unidad->nombre_unidad}}</option>
            @endforeach
          </select>
          <label for="id_unidad_rrhh" class="form-label me-3 ml-4">Unidad de RRHH</label>
          <span class="ml-5" data-bs-toggle="tooltip" title="Debe seleccionar la unidad de recursos humanos a la que pertenece el Investigador">
            <i class="bi bi-info-circle text-info"></i>
          </span>
          <select class="form-control ml-5 @error('id_unidad_rrhh') is-invalid @enderror" tabindex="5" name="id_unidad_rrhh" id="id_unidad_rrhh">
            <option selected>Seleccione la Unidad</option>
            @foreach ($rrhh as $rh)
            <option value="{{$rh->id_unidad_rrhh}}">{{$rh->nombre_unidad_rrhh}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-between mb-2">
    <button type="submit" class="btn btn-success"><i class="bi bi-plus-lg"></i> Registrar</button>
    <a href="/investigadores" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Cancelar</a>
  </div>
</form>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>