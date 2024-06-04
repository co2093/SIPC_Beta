@extends('layouts.default')
@section('content')
<section class="border">
	<h2 class="m-4 text-center">Datos personales</h2>

    <div class="">
        <!-- Aquí colocarías tu formulario -->
        <form>
            <div class="row">
                <div class="form-group col-3 ml-auto mr-auto">
                    <img src="img/undraw_profile.svg" class="col-12">
                    <input type="button" name="" value="Editar" class="col-12 btn btn-secondary m-2">
                </div>
                <div class="row col-9 offset-2">
                	 <div class="form-group col-6 mr-auto ml-auto">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="col-8 form-control" id="nombre">
                    </div>

                    <div class="form-group col-6 mr-auto ml-auto">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="col-8 form-control" id="apellido">
                    </div>

                    <div class="form-group col-6 mr-auto ml-auto">
                        <label for="ORCID">Cod. ORCID:</label>
                        <input type="Text" class="col-8 form-control" id="ORCID" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                    </div>
                    <div class="form-group col-6 mr-auto ml-auto">
                        <label for="sexo">Sexo:</label>
                        <input type="Text" class="col-8 form-control" id="sexo">
                    </div>
                    <div class="form-group col-6 mr-auto ml-auto">
                        <label for="fecha de nacimiento">Fecha de nacimiento:</label>
                        <input type="Text" class="col-8 form-control" id="fecha de nacimiento">
                    </div>
                    <div class="form-group col-6 mr-auto ml-auto">
                        <label for="facultadActual">Facultad actual:</label>
                        <input type="Text" class="col-8 form-control" id="facultadActual">
                    </div>
                    <div class="form-group col-6 mr-auto ml-auto">
                        <label for="telefono">Telefono:</label>
                        <input type="Text" class="col-8 form-control" id="telefono">
                    </div>
                    <div class="form-group col-6 mr-auto ml-auto">
                        <label for="cargoActual">Cargo actual:</label>
                        <select class="form-control col-8">
                            <option>---Selecione un cargo---</option>
                            <option id="1">Docente</option>
                            <option id="2">Investigador</option>
                            <option id="3">Docente investigador</option>
                            <option id="4">Administrativo</option>
                            <option id="5">Con proyecto de Investigación</option>
                            <option id="6">Tecnico</option>
                            <option id="7">Auxiliar de investigador</option>
                        </select>
                    </div>
                </div>                
            </div>
            <div class="col-12 row">
            <input type="submit" name="" value="Guardar" class="btn btn-primary col-3 m-5 ml-auto mr-auto">
            </div>
        </form>
    </div>
                
</section>
<section class="border">
    <h2>Docencia</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#publicacionModal">
        <i class="fas fa-plus"></i> Agregar docencia
    </button>

    <div class="modal fade" id="publicacionModal" tabindex="-1" role="dialog" aria-labelledby="publicacionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="publicacionModalLabel">Agregar docencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí colocarías tu formulario -->
                    <form>
                         <div class="form-group">
                            <label for="nombreLibro">Cargo</label>
                            <input type="text" class="form-control" id="nombreLibro">
                        </div>

                        <div class="form-group">
                            <label for="titulo">Institución</label>
                            <input type="text" class="form-control" id="titulo">
                        </div>

                        <div class="form-group">
                            <label for="titulo">Año</label>
                            <input type="text" class="form-control" id="titulo" placeholder="DOÍ u otro">
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
                    <th>Cargo</th>
                    <th>Institución</th>
                    <th>Año</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 2</td>
                    <td>Dato 3</td>
                </tr>
                <tr>
                    <td>Dato 4</td>
                    <td>Dato 5</td>
                    <td>Dato 6</td>                   
                </tr>
                
            </tbody>
        </table>
</section>
<section class="border">
    <h2>Social</h2>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-plus"></i> Agregar social
    </button>

<table class="table">
            <thead>
                <tr>
                    <th>Institución</th>
                    <th>Nombre de proyecto</th>
                    <th>Año</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 2</td>
                    <td>Dato 3</td>
                </tr>
                <tr>
                    <td>Dato 4</td>
                    <td>Dato 5</td>
                    <td>Dato 6</td>
                </tr>
                
            </tbody>
        </table>
</section>
<section class="border">
    <h2>Reconocimiento</h2>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-plus"></i> Agregar reconocimiento
    </button>

<table class="table">
            <thead>
                <tr>
                    <th>Institución</th>
                    <th>Descripción</th>
                    <th>Año</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 2</td>
                    <td>Dato 3</td>
                </tr>
                <tr>
                    <td>Dato 4</td>
                    <td>Dato 5</td>
                    <td>Dato 6</td>
                </tr>
                
            </tbody>
        </table>
</section>



@endsection
