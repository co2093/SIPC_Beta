@extends('layouts.default')
@section('content')




<div class="card">
    <div class="card-header">Actualizar Responsable</div>
      <div class="card-body">
        
        

         
          
          <p class="card-text">
               <form action="#">
                      
                      
                      <label for="personas">Nombre</label>
                      <input type="text" name='nombre_persona' class="form-control" required>
                      
                      <label for="">Apellido</label>
                      <input type="text" name='apellido_persona' class="form-control" required>
                       
                      <label for="">Grado Academico</label>
                      <input type="text" name='titulo_g_acad' class="form-control" required>

                      <label for="">Carrera</label>
                      <input type="text" name='nombre_carrera' class="form-control" required>

                      <label for="">Cargo</label>
                      <input type="text" name='nombre_cargo' class="form-control" required>
                      
                      
                      <label for="">Telefono</label>
                      <input type="text" name='telefono_persona' class="form-control" required>
                      
                      <label for="">Correo</label>
                      <input type="text" name='correo_persona' class="form-control" required>
 
                      <label for="">Responsable</label>
                      <div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"></div>
                      <br>
                     
                      <a href="{{ route("responsable.index")}}" class="btn btn-info" data-bs-dismiss="modal">
                            <span class="fas fa-undo-alt"></span>  Regresar
                      </a>
                      
                      <button class="btn btn-warning">
                             <span class="fas fa-user-edit"></span>  Actualizar
                      </button>
              
                       
                      

               </form>
          </p>
          
      </div>
  </div>



@endsection


