@extends('layouts.default')
@section('content')
<!-- Sección 1 -->
    <section class="border">
        <h2>Proyectos de Investigación</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formacionModal">
        <i class="fas fa-plus"></i> Agregar Proyecto
    </button>

    <div class="modal fade" id="formacionModal" tabindex="-1" role="dialog" aria-labelledby="formacionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="formacionModalLabel">Agregar Proyecto</h5>
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
                            <label for="tituloProyecto">Titulo de proyecto</label>
                            <input type="text" class="form-control" id="tituloProyecto">
                        </div>

                        <div class="form-group">
                            <label for="areaConocimiento">Area de conocimiento</label>
                            <input type="text" class="form-control" id="areaConocimiento">
                        </div>

                        <div class="form-group">
                            <label for="montoTotal">Monto total</label>
                            <input type="text" class="form-control" id="montoTotal">
                        </div>


                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado">
                        </div>

                        <div class="form-group">
                            <label for="fechaTitulacion">Fecha de titulación</label>
                            <input type="Date" class="form-control" id="fechaTitulacion">
                        </div>

                        <div class="form-group">
                            <label for="tipoFormacion">Tipo de formación</label>
                            <input type="text" class="form-control" id="tipoFormacion">
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
                    <th>Facultad/Unidad</th>
                    <th>Titulo proyecto</th>
                    <th>Area de conocimiento</th>
                    <th>Monto total</th>
                    <th>Estado</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de finalización</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 4</td>
                    <td>Dato 2</td>
                    <td>210</td>
                    <td>Proceso</td>
                    <td>Dr</td>
                    <td>Dato 3</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarModal">
                        <i class="fas fa-pencil-alt"></i> Editar
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Dato 4</td>
                    <td>Dato 12</td>
                    <td>Dato 5</td>
                    <td>439</td>
                    <td>Finalizado</td>
                    <td>Ing</td>
                    <td>Dato 6</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarModal">
                        <i class="fas fa-pencil-alt"></i> Editar
                        </button>
                    </td>
                    
                </tr>
                
            </tbody>
        </table>

        <div>
            <section class="border">
                <h2>Fuente de financiamiento</h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AgregarFinanciador">
                <i class="fas fa-plus"></i> Agregar Financiador
            </button>
             <table class="table">
            <thead>
                <tr>
                    <th>Titulo Proyecto</th>
                    <th>Nombre de la Institución</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 1</td>
                    <td>Dato 12</td>
                    
                </tr>
                <tr>
                    <td>Dato 4</td>
                    <td>Dato 21</td>
                    <td>Dato 12</td>
                    
                    
                </tr>
                
            </tbody>
        </table>

        <div class="modal fade" id="AgregarFinanciador" tabindex="-1" role="dialog" aria-labelledby="AgregarFinanciadorLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="AgregarFinanciadorLabel">Agregar Financiador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí colocarías tu formulario -->
                    <form>
                        <div class="form-group">
                            <label for="tituloProyecto">Titulo de Proyecto</label>
                            <input type="text" class="form-control" id="tituloProyecto">
                        </div>

                         <div class="form-group">
                            <label for="nombreInstitucion">Fuente de financiamiento</label><br>
                            <label class="col-5">Interno: 
                                <input type="radio" class="col-5" id="interno" name="fuente" value="interno">
                            </label>
                            <label class="col-5">Externo:
                                <input type="radio" class="col-5" id="externo" name="fuente" value="externo">
                            </label>
                            <input type="text" class="form-control" id="fuenteFinanciamiento">
                        </div>
                        

                        <div class="form-group">
                            <label for="areaConocimiento">Cantidad</label>
                            <input type="text" class="form-control" id="areaConocimiento">
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
    </section>

    
@endsection
