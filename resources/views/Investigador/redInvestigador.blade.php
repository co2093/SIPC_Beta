@extends('layouts.default')
@section('content')
<!-- Sección 1 -->
    <section class="border">
        <h2>Red de Investigadores</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formacionModal">
        <i class="fas fa-plus"></i> Agregar Red
    </button>

    <div class="modal fade" id="formacionModal" tabindex="-1" role="dialog" aria-labelledby="formacionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="formacionModalLabel">Agregar Red</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí colocarías tu formulario -->
                    <form>
                        <div class="form-group">
                            <label for="nombreRed">Nombre de la Red</label>
                            <input type="text" class="form-control" id="nombreRed">
                        </div>
                    	 <div class="form-group">
                            <label for="nombreInstitucion">Nombre de la Institución</label>
                            <input type="text" class="form-control" id="nombreInstitucion">
                        </div>

                        <div class="form-group">
                            <label for="tituloProyecto">Titulo de Proyecto</label>
                            <input type="text" class="form-control" id="tituloProyecto">
                        </div>

                        <div class="form-group">
                            <label for="fechaInicio">Fecha de Incio</label>
                            <input type="Date" class="form-control" id="fechaInicio">
                        </div>

                        <div class="form-group">
                            <label for="fechaFin">Fecha de Finalización</label>
                            <input type="Date" class="form-control" id="fechaFin">
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
                    <th>Nombre de Red</th>
                    <th>Nombre de la Institución</th>
                    <th>Titulo Proyecto</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Finalización</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 4</td>
                    <td>Dato 2</td>
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
    </section>

    
@endsection
