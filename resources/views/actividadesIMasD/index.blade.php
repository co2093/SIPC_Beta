@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<div style="text-align: center;">
  <h1>Listado de Actividades</h1>
  <a href="actividadesIMasD/create" class="btn btn-success mb-4"><i class="bi bi-plus-lg"> </i> Agregar</a>
</div>
<div class="card-body">
  <table id="actividadesIMasD" style="width:100%" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-dark">
      <tr>
        <th scope="col">Nombre del Proyecto</th>
        <th scope="col">Actividad(es)</th>
        <th scope="col">Fecha de Inicio</th>
        <th scope="col">Fecha de Finalizaci&oacute;n</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($actividadesIMasD as $actividadIMasD)
      <tr>
        <td>{{$actividadIMasD->actividadesIMasDProyecto->nombre_proyecto}}</td>
        <td>{{$actividadIMasD->nombre_actividad}}</td>
        <td>{{$actividadIMasD->fecha_inicio_actividad}}</td>
        <td>{{$actividadIMasD->fecha_fin_actividad}}</td>
        <td>
          <a class="btn btn-warning" href="actividadesIMasD/{{$actividadIMasD->id_actividad}}/edit"><i
              class="fas fa-pen"></i></a>
          <button class="btn btn-danger delete-button"
            data-action="{{route('actProIDDestroy',$actividadIMasD->id_actividad)}}"><i class="fas fa-trash-alt">
            </i></button>
        </td>
      </tr>
      @endforeach
    </tbody>
    <!-- JS de Bootstrap y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  </table>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script>
  new DataTable('#actividadesIMasD', {
    lengthMenu: [
      [3, 6, 9, 27, -1],
      [3, 6, 9, 27, 'All']
    ],
    paging: true, // Habilitar paginación
    pageLength: 3, // Número de registros por página
    language: {
      "decimal": "",
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
      "infoFiltered": "(Filtrado de _MAX_ total entradas)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ Entradas",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "Sin resultados encontrados",
      "paginate": {
        "first": '<a class="btn btn-outline-secondary"><i class="fas fa-angle-double-left"></i></a>',
        "last": '<a class="btn btn-outline-secondary"><i class="fas fa-angle-double-right"></i></a>',
        "next": '<a class="btn btn-outline-secondary"><i class="fas fa-chevron-right"></i></a>',
        "previous": '<a class="btn btn-outline-secondary"><i class="fas fa-chevron-left"></i></a>'
      }
    }
  });

  // Mostrar modal al hacer clic en el botón de eliminar
  $('#actividadesIMasD').on('click', '.delete-button', function() {
    var action = $(this).data('action');
    $('#deleteForm').attr('action', action);
    $('#confirmDeleteModal').modal('show');
  });
  </script>
</div>
<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que deseas eliminar este investigador?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form id="deleteForm" action="#" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Script para cerrar el modal -->
<script>
// Selecciona el botón "Cancelar" y le agrega un evento de clic para cerrar el modal
document.querySelector('#confirmDeleteModal .btn-secondary').addEventListener('click', function() {
  var modal = document.getElementById('confirmDeleteModal');
  var modalInstance = bootstrap.Modal.getInstance(modal);
  modalInstance.hide();
});
</script>

@endsection