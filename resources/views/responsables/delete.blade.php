@extends('layouts.default')
@section('content')
<div class="card">
    <div class="card-header">Eliminar Responsable</div>
    <div class="card-body">
        <p class="card-text">
        <div class="alert alert-danger" role="alert">
            Estas seguro de eliminar este registro !!!
            <table class="table table-sm table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Grado Acad&eacute;mico</th>
                    <th>Carrera</th>
                    <th>Cargo</th>
                    <th>Tel&eacute;fono</th>
                    <th>Correo</th>
                    <th>Responsable</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Juan</td>
                        <td>Perez</td>
                        <td>Maestria en Ciencia de Datos</td>
                        <td>Ingenier&iacute; en Sistemas Inform&aacute;ticos</td>
                        <td>Ejemplo de Cargo</td>
                        <td>2233-4455</td>
                        <td>asarf@email.com</td>
                        <td>SI</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="">
                <a href="{{ route("responsable.index")}}" class="btn btn-info" data-bs-dismiss="modal">
                    <span class="fas fa-undo-alt"></span> Regresar
                </a>
                <button class="btn btn-danger">
                    <span class="fas fa-user-times"></span> Eliminar
                </button>
            </form>
        </div>
        </p>
    </div>
</div>



@endsection