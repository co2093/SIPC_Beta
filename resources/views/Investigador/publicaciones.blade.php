@extends('layouts.default')
@section('content')
<section class="border">
    <h2>Publicaciones</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#publicacionModal">
        <i class="fas fa-plus"></i> Agregar Publicación
    </button>

    <div class="modal fade" id="publicacionModal" tabindex="-1" role="dialog" aria-labelledby="publicacionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="publicacionModalLabel">Agregar Publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí colocarías tu formulario -->
                    <form>
                         <div class="form-group">
                            <label for="nombreLibro">Nombre del Libro o Articulo</label>
                            <input type="text" class="form-control" id="nombreLibro">
                        </div>

                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo">
                        </div>

                        <div class="form-group">
                            <label for="fechaPublicacion">Fecha de Publicación</label>
                            <input type="Date" class="form-control" id="fechaPublicacion">
                        </div>

                        <div class="form-group">
                            <label for="editorial">Editorial</label>
                            <input type="text" class="form-control" id="editorial">
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre del Libro o Articulo</th>
                    <th>Titulo</th>
                    <th>Fecha de Publicación</th>
                    <th>Editorial</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 2</td>
                    <td>Dato 3</td>
                    <td>Dato 7</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarModal">
                        <i class="fas fa-pencil-alt"></i> Editar
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Dato 4</td>
                    <td>Dato 5</td>
                    <td>Dato 6</td>
                    <td>Dato 8</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarModal">
                        <i class="fas fa-pencil-alt"></i> Editar
                        </button>
                    </td>
                    
                </tr>
                
            </tbody>
        </table>
</section>
@endsection
