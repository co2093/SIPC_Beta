@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('#id_invest').on('input', function() {
    var searchText = $(this).val().toLowerCase();
    var results = $('#search_results');
    results.empty(); // Limpiar resultados anteriores

    // Realizar búsqueda en los nombres de los investigadores
    @foreach($investigadores as $investigador)
    var nombreCompleto =
      '{{$investigador->personasInvestigadores->nombre_persona}} {{$investigador->personasInvestigadores->apellido_persona}}';
    if (nombreCompleto.toLowerCase().includes(searchText)) {
      var idInvest = '{{$investigador->id_invest}}';
      var option = $('<div class="result-item" data-id="' + idInvest + '">' + nombreCompleto + '</div>');
      option.on('click', function() {
        var idInvest = $(this).data('id');
        var nombreInvestigador = $(this).text();
        $('#id_invest').val(
          nombreInvestigador); // Mostrar el nombre del investigador en el campo de entrada (opcional)
        $('#id_invest_hidden').val(idInvest); // Asignar el id_invest al campo oculto
        results.empty(); // Limpiar resultados después de seleccionar
      });
      results.append(option);
    }
    @endforeach
  });

  // Permitir selección haciendo clic fuera del campo de entrada y de los resultados
  $(document).on('click', function(event) {
    if (!$(event.target).closest('#search_results').length && !$(event.target).is('#id_invest')) {
      $('#search_results').empty(); // Limpiar resultados si se hace clic fuera del campo de búsqueda
    }
  });

  // Enviar el formulario con el valor del campo oculto id_invest_hidden al hacer clic en el botón de registro
  $('form').submit(function() {
    // Obtener el valor del campo oculto id_invest_hidden
    var idInvestHidden = $('#id_invest_hidden').val();
    // Asignar el valor del campo oculto al campo visible (opcional, para visualización)
    $('#id_invest').val(idInvestHidden);
    // Continuar con el envío del formulario
    return true;
  });
});
</script>
<style>
#search_results {
  position: absolute;
  width: calc(25% - 8px);
  /* Ancho igual al ancho del campo de búsqueda */
  z-index: 1000;
  background-color: #fff;
  border: 1px solid #ced4da;
  border-top: none;
  max-height: 200px;
  /* Establece una altura máxima para los resultados */
  overflow-y: auto;
  /* Agrega una barra de desplazamiento vertical si los resultados son demasiado largos */
  margin-top: 38px;
  /* Espacio entre el campo de búsqueda y los resultados */
  margin-left: 160px;
}

.result-item {
  padding: 5px;
  cursor: pointer;
}

.result-item:hover {
  background-color: #f0f0f0;
}
</style>
<h1 style="text-align: center;">Registro de Proyectos</h1>

<form action="/actividadesProyectos" method="post" style="margin: 25px;">
  @csrf
  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <label for="nombre_proyecto" class="form-label me-3 mr-4">Nombre del proyecto
        </label>
        <span class="mr-4" data-bs-toggle="tooltip" title="Debe ingresar el nombre del proyecto">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="text" class="form-control ml-3 @error('nombre_proyecto') is-invalid @enderror" tabindex="1"
          id="nombre_proyecto" name="nombre_proyecto"
          placeholder="{{ $errors->has('nombre_proyecto') ? $errors->first('nombre_proyecto') : 'Ingrese el nombre del proyecto' }}"
          value="{{ old('nombre_proyecto') }}">
        <label for="descripcion_proyecto" class="form-label me-3 ml-3 mr-4">Descripci&oacute;n del proyecto
        </label>
        <span class="mr-2" data-bs-toggle="tooltip" title="Debe ingresar una descripcion del proyecto">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="text" class="form-control  @error('descripcion_proyecto') is-invalid @enderror" tabindex="1"
          id="descripcion_proyecto" name="descripcion_proyecto"
          placeholder="{{ $errors->has('descripcion_proyecto') ? $errors->first('descripcion_proyecto') : 'Ingrese una descripcion del proyecto' }}"
          value="{{ old('descripcion_proyecto') }}">
      </div>
    </div>
  </div>
  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <label for="codigo_proyecto_sicues" class="form-label me-3 mr-3">C&oacute;digo de Proyecto (SIC-UES)
        </label>
        <span class="mr-4" data-bs-toggle="tooltip" title="Debe ingresar el codigo del proyecto (SIC-UES)">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="text" class="form-control ml-3 @error('codigo_proyecto_sicues') is-invalid @enderror" tabindex="1"
          id="codigo_proyecto_sicues" name="codigo_proyecto_sicues"
          placeholder="{{ $errors->has('codigo_proyecto_sicues') ? $errors->first('codigo_proyecto_sicues') : 'Ingrese el codigo del proyecto (SIC-UES)' }}"
          value="{{ old('codigo_proyecto_sicues') }}">
        <label for="codigo_proyecto_facultad" class="form-label me-3 ml-3 mr-4">C&oacute;digo de Proyecto (Facultad)
        </label>
        <span class="mr-2" data-bs-toggle="tooltip" title="Debe ingresar el codigo del proyecto (Facultad)">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="text" class="form-control  @error('codigo_proyecto_facultad') is-invalid @enderror" tabindex="1"
          id="codigo_proyecto_facultad" name="codigo_proyecto_facultad"
          placeholder="{{ $errors->has('codigo_proyecto_facultad') ? $errors->first('codigo_proyecto_facultad') : 'Ingrese el codigo del proyecto (Facultad)' }}"
          value="{{ old('codigo_proyecto_facultad') }}">
      </div>
    </div>
  </div>
  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <label for="id_l_de_invest" class="form-label me-3 ">L&iacute;nea de Investigaci&oacute;n
        </label>
        <span class="ml-3" data-bs-toggle="tooltip" title="Debe seleccionar una linea de investigacion">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <select class="form-control  ml-4 @error('id_l_de_invest') is-invalid @enderror" tabindex="4"
          name="id_l_de_invest" id="id_l_de_invest">
          @foreach ( $lineas as $linea)
          <option value="{{$linea->id_l_de_invest}}">{{$linea->nombre_l_invest}}</option>
          @endforeach
        </select>
        <label for="id_area_conocimiento" class="form-label me-3 ml-3">&Aacute;rea de Conocimiento</label>
        <span class="ml-2" data-bs-toggle="tooltip" title="Debe seleccionar un area">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <select class="form-control  ml-3 @error('id_area_conocimiento') is-invalid @enderror" tabindex="5"
          name="id_area_conocimiento" id="id_area_conocimiento">
          @foreach ($areas as $area)
          <option value="{{$area->id_area_conocimiento}}">{{$area->nombre_area_conocimiento}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <label for="id_invest" class="form-label me-3">Nombre del Investigador</label>
        <span class="ml-4" data-bs-toggle="tooltip" title="Debe ingresar el nombre del investigador">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <input type="hidden" id="id_invest_hidden" name="id_invest" value="">
        <input type="text" class="form-control ml-4" tabindex="6" name="id_invest" id="id_invest"
          placeholder="Ingrese el nombre del investigador">
        <div id="search_results"></div> <!-- Aquí se mostrarán los resultados de la búsqueda -->
        <!-- Mostrar errores de validación -->
        @error('id_invest')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="id_facultad" class="form-label me-3 ml-2">Facultad a la que pertenece</label>
        <span class="ml-2" data-bs-toggle="tooltip" title="Debe seleccionar un area">
          <i class="bi bi-info-circle text-info"></i>
        </span>
        <select class="form-control ml-5 @error('id_facultad') is-invalid @enderror" tabindex="5" name="id_facultad"
          id="id_facultad">
          @foreach ($facultades as $facultad)
          <option value="{{$facultad->id_facultad}}">{{$facultad->nombre_facultad}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="form-container d-flex flex-column ">
    <div class="tab-content" id="myTabContent">
      <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <label for="fecha_inicio_proyecto" class="form-label me-3 w-25">Fecha de Inicio del Proyecto</label>
        <input type="date" name="fecha_inicio_proyecto" id="fecha_inicio_proyecto"
          class="form-control ml-3 w-75 @error('fecha_inicio_proyecto') is-invalid @enderror">
        @error('fecha_inicio_proyecto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="fecha_fin_proyecto" class="form-label me-3 ml-3 w-25">Fecha de Finalización del Proyecto</label>
        <input type="date" name="fecha_fin_proyecto" id="fecha_fin_proyecto"
          class="form-control ml-3 w-75 @error('fecha_fin_proyecto') is-invalid @enderror">
        @error('fecha_fin_proyecto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>
  </div>
  <div>
    <h5 style="text-align: center; margin-bottom: 20px;">Datos del Objetivo del Proyecto</h5>
  </div>
  <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
    <label for="titulo_objetivo" class="form-label me-3">T&iacute;tulo del Objetivo</label>
    <span data-bs-toggle="tooltip" title="Debe ingresar el titulo del objetivo del proyecto">
      <i class="bi bi-info-circle text-info"></i>
    </span>
    <input type="text" class="form-control  @error('titulo_objetivo') is-invalid @enderror" tabindex="1"
      id="titulo_objetivo" name="titulo_objetivo"
      placeholder="{{ $errors->has('titulo_objetivo') ? $errors->first('titulo_objetivo') : 'Ingrese el titulo del objetivo' }}"
      value="{{ old('titulo_objetivo') }}">
  </div>
  <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
    <label for="descripicion_objetivo" class="form-label me-3">Descripci&oacute;n Objetivo</label>
    <span data-bs-toggle="tooltip" title="Debe ingresar la descripcion del objetivo del proyecto">
      <i class="bi bi-info-circle text-info"></i>
    </span>
    <input type="text" class="form-control @error('descripcion_objetivo') is-invalid @enderror" tabindex="1"
      id="descripcion_objetivo" name="descripcion_objetivo"
      placeholder="{{ $errors->has('descripcion_objetivo') ? $errors->first('descripcion_objetivo') : 'Ingrese la descripción del objetivo' }}"
      value="{{ old('descripcion_objetivo') }}">
  </div>
  <div class="d-flex justify-content-between mb-2">
    <button type="submit" class="btn btn-success"><i class="bi bi-plus-lg"></i> Registrar</button>
    <a href="/actividadesProyectos" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Cancelar</a>
  </div>
</form>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>