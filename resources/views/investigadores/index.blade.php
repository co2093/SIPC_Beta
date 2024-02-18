@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<div style="text-align: center;">
<h1>Listado de Investigadores</h1>
    <a href="investigadores/create" class="btn btn-success mb-4"><i class="bi bi-plus-lg"> </i> Agregar</a>
</div>
<div class="card-body">
    <table id="investigadores" style="width:100%" class="table table-striped table-bordered shadow-lg mt-4">
        <thead class="bg-dark">
            <tr>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">G&eacute;nero</th>
                <th scope="col">M&aacute;ximo Grado Acad&eacute;mico</th>
                <th scope="col">Carrera seg&uacute;n T&iacute;tulo</th>
                <th scope="col">Acr&oacute;nimo</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Brallan</td>
                <td>Sanchez</td>
                <td>brsr1234@gmail.com</td>
                <td>Masculino</td>
                <td>Ingeniero en Sistemas Informaticos</td>
                <td>Ingenieria en Sistemas Informaticos</td>
                <td>Ing.</td>
                <td>
                    <form action="" method="POST">
                        <a class="btn btn-warning" href="investigadores/edit"><i class="bi bi-pencil-square"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="bi bi-trash"> </i></button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Karla</td>
                <td>Hernandez</td>
                <td>khnandez@gmail.com</td>
                <td>Femenino</td>
                <td>Ingeniera en Sistemas Informaticos</td>
                <td>Ingenieria en Sistemas Informaticos</td>
                <td>Inga.</td>
                <td>
                    <form action="" method="POST">
                        <a class="btn btn-warning" href="investigadores/edit"><i class="bi bi-pencil-square"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="bi bi-trash"> </i></button>
                    </form>
                </td>
            </tr>
        </tbody>

    </table>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        new DataTable('#investigadores', {
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
                    "first": '<a class="btn btn-outline-secondary"><i class="bi bi-chevron-double-left"></i></a>',
                    "last": '<a class="btn btn-outline-secondary"><i class="bi bi-chevron-double-right"></i></a>',
                    "next": '<a class="btn btn-outline-secondary"><i class="bi bi-chevron-right"></i></a>',
                    "previous": '<a class="btn btn-outline-secondary"><i class="bi bi-chevron-left"></i></a>'
                }
            }
        });
    </script>
</div>
@endsection