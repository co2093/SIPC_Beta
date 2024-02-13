@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    new DataTable('#investigadores', {
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, 'All']
        ],
        language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    });
</script>
<h1 style="text-align: center;">Listado de Docentes e Investigadores</h1>
<div style="padding: 25px;">
    <a href="investigadores/create" class="btn btn-success mb-4"><i class="bi bi-plus-lg"> </i> Agregar</a>
</div>
<div class="card-body">
    <table id="investigadores" style="width:100%" class="table table-striped table-bordered shadow-lg mt-4">
        <thead>
            <tr>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Email</th>
                <th scope="col">M&aacute;ximo Grado Acad&eacute;mico</th>
                <th scope="col">Carrera seg&uacute;n T&iacute;tulo</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>
                    fg
                </td>
                <td>
                    df
                </td>
                <td>
                    sd
                </td>
                <td>
                    as
                </td>
                <td>
                    ls
                </td>
                <td>
                    <form action="" method="POST">
                        <a class="btn btn-warning" href=""><i class="bi bi-pencil-square"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="bi bi-trash"> </i></button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

</div>
@endsection