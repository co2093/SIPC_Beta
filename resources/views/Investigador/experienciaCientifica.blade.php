@extends('layouts.default')
@section('content')
<section class="border">
    <h2>Experiencia cientifica</h2>


    <div class="modal fade" id="experienciaModal" tabindex="-1" role="dialog" aria-labelledby="experienciaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="experienciaModalLabel">Agregar formación académica</h5>
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
                            <label for="tituloInvestigacion">Titulo de investigación</label>
                            <input type="text" class="form-control" id="tituloInvestigacion">
                        </div>

                        <div class="form-group">
                            <label for="cargo">Cargo</label>
                            <input type="Text" class="form-control" id="cargo" placeholder="Digite investigador principal u otro cargo">
                        </div>

                        <div class="form-group">
                            <label  for="fechaInicio">Año</label>
                            <input type="Date" class="form-control" id="fechaInicio">
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
                    <th>Titulo de investigación</th>
                    <th>Area de conocimiento</th>
                    <th>Año</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 2</td>
                    <td>Dato 3</td>
                    <td>Dato 7</td>

                </tr>
                <tr>
                    <td>Dato 4</td>
                    <td>Dato 5</td>
                    <td>Dato 6</td>
                    <td>Dato 8</td>

                    
                </tr>
                
            </tbody>
        </table>
</section>
<section class="border">
    <h2>Publicaciones</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#publicacionModal">
        <i class="fas fa-plus"></i> Agregar Publicación
    </button>

    <div class="modal fade" id="publicacionModal" tabindex="-1" role="dialog" aria-labelledby="publicacionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="publicacionModalLabel">Agregar publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí colocarías tu formulario -->
                    <form>
                         <div class="form-group">
                            <label for="nombreLibro">Título de publicación</label>
                            <input type="text" class="form-control" id="nombreLibro">
                        </div>
                         <div class="form-group">
                            <label for="ISSM">ISSM</label>
                            <input type="text" class="form-control" id="ISSM">
                        </div>
                         <div class="form-group">
                            <label for="SBN">SBN</label>
                            <input type="text" class="form-control" id="SBN">
                        </div>

                        <div class="form-group">
                            <label for="titulo">URL repositorio</label>
                            <input type="text" class="form-control" id="titulo">
                        </div>

                        <div class="form-group">
                            <label for="titulo">Identificador</label>
                            <input type="text" class="form-control" id="titulo" placeholder="DOÍ u otro">
                        </div>

                          <div class="form-group">
                            <label for="fechaPublicacion">Fecha de publicación</label>
                            <input type="Date" class="form-control" id="fechaPublicacion">
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
                    <th>Titulo</th>
                    <th>ISSM</th>
                    <th>SBN</th>
                    <th>URL</th>
                    <th>Fecha de Publicación</th>
                    <th>Editorial</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 2</td>
                    <td>Dato 3</td>
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
                    <td>Dato 3</td>
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
    <h2>Patentes</h2>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-plus"></i> Agregar patente
    </button>

<table class="table">
            <thead>
                <tr>
                    <th>Nombre de la patente</th>
                    <th>Autores</th>
                    <th>Número de patente</th>
                    <th>Lugar</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 2</td>
                    <td>Dato 3</td>
                    <td>Dato 7</td>
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
