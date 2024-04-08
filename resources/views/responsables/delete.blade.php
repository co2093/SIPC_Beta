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
                    <th>Grado Academico</th> 
                    <th>Carrera</th>
                    <th>Cargo</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Responsable</th>

                </thead>
                <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                </tbody>
            </table>   
             <hr>
                <form action="">
                    <a href="{{ route("responsable.index")}}" class="btn btn-info" data-bs-dismiss="modal">
                        <span class="fas fa-undo-alt"></span>  Regresar
                   </a>
                    <button class="btn btn-danger">
                        <span class="fas fa-user-times"></span>  Eliminar
                    </button>
                </form>      
            </div>
          </p>          
      </div>
  </div>



@endsection


