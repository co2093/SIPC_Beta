@extends('layouts.default')
@section('content')
<section class="border">
	<h2>Experiencia Laboral</h2>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#experienciaModal">
		<i class="fas fa-plus"></i> Agregar Experiencia Laboral
	</button>

	<div class="modal fade" id="experienciaModal" tabindex="-1" role="dialog" aria-labelledby="experienciaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="experienciaModalLabel">Agregar Formación Academica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí colocarías tu formulario -->
                    <form>
                    	 <div class="form-group">
                            <label for="nombreInstitucion">Nombre de la Institución</label>
                            <input type="text" class="form-control" id="nombreInstitucion">
                        </div>

                        <div class="form-group">
                            <label for="tituloProyecto">Titulo de Proyecto</label>
                            <input type="text" class="form-control" id="tituloProyecto">
                        </div>

                        <div class="form-group">
                            <label for="cargo">Cargo</label>
                            <input type="Text" class="form-control" id="cargo">
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
                    <th>Nombre de la Institución</th>
                    <th>Titulo de Proyecto</th>
                    <th>Cargo</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Finalización</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 2</td>
                    <td>Dato 3</td>
                    <td>Dato 7</td>
                    <td>Dato 9</td>
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
                    <td>Dato 10</td>
                    <td>
                    	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarModal">
			            <i class="fas fa-pencil-alt"></i> Editar
				        </button>
				    </td>
                    
                </tr>
                
            </tbody>
        </table>
</section>
<section class="border">
	<h2>Referencia Laboral</h2>
	<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#referenciaModal">
		<i class="fas fa-plus"></i> Agregar Referencia Laboral
	</button>

	<div class="modal fade" id="referenciaModal" tabindex="-1" role="dialog" aria-labelledby="referenciaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="referenciaModalLabel">Agregar Formación Academica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí colocarías tu formulario -->
                    <form>
                    	 <div class="form-group">
                            <label for="nombreReferencia">Nombre de la Persona</label>
                            <input type="text" class="form-control" id="nombreReferencia">
                        </div>

                        <div class="form-group">
                            <label for="Celular">Celular</label>
                            <input type="tel" class="form-control" id="Celular">
                        </div>

                        <div class="form-group">
                            <label for="nombreEmpresa">Nombre de la Empresa</label>
                            <input type="text" class="form-control" id="nombreEmpresa">
                        </div>

                        <div class="form-group">
                            <label for="puesto">Puesto</label>
                            <input type="Text" class="form-control" id="puesto">
                        </div>

                        <div class="form-group">
                            <label for="descipcion">Descipcion</label>
                            <input type="Text" class="form-control" id="descipcion">
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
                    <th>Nombre de Referencia</th>
                    <th>Celular</th>
                    <th>Nombre de la Empresa</th>
                    <th>Puesto</th>
                    <th>Descripción</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 2</td>
                    <td>Dato 3</td>
                    <td>Dato 7</td>
                    <td>Dato 9</td>
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
                    <td>Dato 10</td>
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
