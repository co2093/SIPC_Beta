@extends('layouts.default')
@section('content')
<!-- Sección 2 -->
    <section class="border">
        <h2>Habilidad Informatica</h2>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#habilidadModal">
        <i class="fas fa-plus"></i> Agregar Habilidad Informática
    </button>

    <div class="modal fade" id="habilidadModal" tabindex="-1" role="dialog" aria-labelledby="habilidadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="exampleModalLabel">Agregar Habilidad Informática</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí colocarías tu formulario -->
                    <form>
                       
                        <div class="form-group">
                            <label for="nombrePrograma">Nombre del Programa</label>
                            <input type="Text" id="nombrePrograma" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="selectNivel"></label>
                            <select class="form-control" id="selectNivel">
                                <option>---Selecione nivel---</option>
                                <option>Bajo</option>
                                <option>Medio</option>
                                <option>Alto</option>
                            </select>
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
                    <th>Programa</th>
                    <th>Nivel</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato A</td>
                    <td>Dato B</td>
                    <td>
                        <button type="butto" class="btn-warning btn" data-toggle="modal" data-targe="#editarModal">
                            <i class="fas fa-pencil-alt"></i> Editar
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Dato X</td>
                    <td>Dato Y</td>
                    <td>
                        <button class="btn btn-warning" type="button" data-togle="modal" data-targe="#editarModal">
                            <i class="fas fa-pencil-alt"></i> Editar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Sección 3 -->
    <section class="border">
        <h2>Idioma</h2>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#idiomaModal">
        <i class="fas fa-plus"></i> Agregar Idioma
    </button>

    <div class="modal fade" id="idiomaModal" tabindex="-1" role="dialog" aria-labelledby="idiomaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="idiomaModalLabel">Agregar Idioma</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí colocarías tu formulario -->
                    <form>
                        <div class="form-group">
                            <label for="idioma">Idioma</label>
                            <input type="Text" id="idioma" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="compresionAuditiva">Compresión Auditiva y Oral</label>
                            <select class="form-control" id="compresionAuditiva">
                                <option>---Seleccione Nivel---</option>
                                <option>Bajo</option>
                                <option>Medio</option>
                                <option>Alto</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="compresionLectura">Compresión Lectura y Escritura</label>
                            <select class="form-control" id="compresionLectura">
                                <option>---Seleccione Nivel---</option>
                                <option>Bajo</option>
                                <option>Medio</option>
                                <option>Alto</option>
                            </select>
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
                    <th>Idioma</th>
                    <th>Comprensión Auditiva y Oral</th>
                    <th>Compresión Lectura y Escritura</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ingles</td>
                    <td>Bajo</td>
                    <td>Bajo</td>
                    <td>
                        <button class="btn btn-warning" type="button" data-toggle="modal" dta-targe="#editarModal">
                            <i class="fas fa-pencil-alt"></i> Editar
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Aleman</td>
                    <td>Bajo</td>
                    <td>Bajo</td>
                    <td>
                        <button type="button" class="btn btn-warning" dta-toggle="modal" data-targe="#editarModal">
                            <i class="fas fa-pencil-alt"></i> Editar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
