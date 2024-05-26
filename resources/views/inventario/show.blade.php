@extends('layouts.default')
@section('content')
@if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
@endif

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Inventario</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Gestión de inventario
                            <a  class="btn btn-success float-right" href="{{route('inventario.crear')}}">Agregar</a>
                        </h6>
                    </div>

                    <div class="card-body">
                    
                    <!-- Search Box -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="searchInput" placeholder="Buscar...">
                            </div>
                        </div>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Serie</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Facultad</th>
                                     <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                               @foreach($inventario as $i)
                                    <tr>
                                        <td>{{$i->serie}}</td>
                                        <td>{{$i->descripcionbien}}</td>
                                        <td>{{$i->cantidad}}</td>
                                        <td>{{$i->facultad}}</td>
                                        <td>
                                        <a  class="btn btn-info btn-sm" href="{{ route('inventario.details', $i->codinventario) }}"><i class="fas fa-eye"></i></a>  
                                        <a  class="btn btn-primary btn-sm" href="{{ route('inventario.edit', $i->codinventario) }}"><i class="fas fa-edit"></i></a>                                        
                                        <a  class="btn btn-danger btn-sm" 
                                        href="{{ route('inventario.confirm', $i->codinventario) }}"><i class="fas fa-trash"></i></a>


                                        </td>
                                    </tr>
                               @endforeach

                            </tbody>
                        </table>
                      <a  class="btn btn-secondary float-right" href="{{route('home')}}">Regresar</a>



                    </div>
            </div>
        </div>                    
    </div>

    <script>
        $('#detailsModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var title = button.data('title'); // Extract info from data-* attributes
            var description = button.data('description'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('.modal-title').text(title);
            modal.find('#modalTitle').text(title);
            modal.find('#modalDescription').text(description);
        });
    </script>

    <!-- Delete Confirmation Modal 
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación del producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Esta seguro de eliminar el producto?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="{{ route('inventario.destroy', $i->codinventario) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var taskId = button.data('taskid'); // Extract info from data-* attributes
            var form = $('#deleteForm');
            form.attr('action', '/tasks/' + taskId);
        });
    </script>
-->
@endsection
