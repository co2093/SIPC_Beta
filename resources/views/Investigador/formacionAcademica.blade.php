@extends('layouts.default')
@section('content')
<!-- Sección 1 -->
    <section class="border">
        <h2>Formación académica</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formacionModal">
        <i class="fas fa-plus"></i> Agregar formación
    </button>

    <div class="modal fade" id="formacionModal" tabindex="-1" role="dialog" aria-labelledby="formacionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="formacionModalLabel">Agregar formación académica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí colocarías tu formulario -->
                    <form>
                         <div class="form-group">
                            <label for="nombreInstitucion">Nombre de la institución</label>
                            <input type="text" class="form-control" id="nombreInstitucion">
                        </div>

                        <div class="form-group">
                            <label for="tituloObtenido">Título obtenido</label>
                            <input type="text" class="form-control" id="tituloObtenido">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 row">
                                    <label for="acronimo" class="col-form-label col-5">Acrónimo</label>
                                    <input type="text" class="col-6 form-control" id="acronimo">
                                </div>
                                <div class="col-6 row">
                                    <label for="max" class="col-form-label col-7">Nivel máximo</label>
                                    <input type="checkbox" class="col-1" id="max" name="checkMax">
                                </div>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="fechaTitulacion">Fecha de titulación</label>
                            <input type="Date" class="form-control" id="fechaTitulacion">
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
                    <th>Nombre de la institución</th>
                    <th>Título obtenido</th>
                    <th>Acrónimo</th>
                    <th>Nivel Max</th>
                    <th>Fecha de titulación</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 2</td>
                    <td>Dr</td>
                    <td><input type="checkbox" id="checkMayor" name="opcion" value="opcion" disabled></td>
                    <td>Dato 3</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarModal">
                        <i class="fas fa-pencil-alt"></i> Editar
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Dato 4</td>
                    <td>Dato 5</td>
                    <td>Ing</td>
                    <td><input type="checkbox" id="checkMayor" name="opcion" value="opcion1" disabled checked ></td>
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
