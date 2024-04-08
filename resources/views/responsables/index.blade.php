
@extends('layouts.default')
@section('content')



<div class="card">
    <h5 class="card-header">Seleccionar Responsable</h5>
    <div class="card-body">

          
        <div class="row">
            <div class="col-sm-12">

                @if ($mensaje = Session::get('success'))
                     <div class="alert alert-success" role="alert">
                           {{ $mensaje }}
                     </div>    
                @endif

        
                
            </div>
        </div> 


         <h5 class="card-title text-center">Listado de personas ingresados</h5>



         <p>
                <a href="{{ route("responsable.buscar")}}" class="btn btn-primary">
                <span class="fas fa-user-plus"></span>  Seleccionar Responsable</a>


         </p>

         

         <hr>
          
         <form class="d-flex">
          <input class="form-control me-4" type="search" placeholder="Buscar Persona" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>

        <hr>


         <p class="card-text">
            <div class="table table-responsive">
                  <table class="table table-sm table-bordered">
                        <thead>
                             <th>Nombre</th>
                             <th>Apellido</th>
                             <th>Grado Academico</th> 
                             <th>Carrera</th>
                             <th>Cargo</th>
                             <th>Telefono</th>
                             <th>Correo</th>
                             <th>Responsable</th>
                             <th>Editar</th>
                             <th>Eliminar</th>
                        </thead>
                        <tbody>

                    @foreach ($aa_de_uus as $aa_de_uu)
                         
                     

                            <tr>
                                <td>{{ $aa_de_uu->personasAa_de_uu->nombre_persona }}</td>
                                <td>{{ $aa_de_uu->personasAa_de_uu->apellido_persona }}</td>
                                <td>{{ $aa_de_uu->gradosacademicosAa_de_uu->titulo_g_acad }}</td>
                                <td>{{ $aa_de_uu->carrerasAa_de_uu->nombre_carrera }}</td>
                            
                                <td>{{ $aa_de_uu->cargosAa_de_uu->nombre_cargo }}</td>
                                <td>{{ $aa_de_uu->personasAa_de_uu->telefono_persona }}</td>
                                <td>{{ $aa_de_uu->personasAa_de_uu->correo_persona }}</td>
                                <td><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"></div></td>
                                <td>
                                    
                                     <form action="{{ route("responsables/responsable.edit", $item->id) }} "method="GET"> 
                                       

                                    <a href="{{ route("responsable.edit")}}" class="btn btn-warning btn-sm">
                                        <span class="fas fa-user-edit"></span></a>
                                    


                                        <button class="btn btn-warning btn-sm">
                                              <span class="fas fa-user-edit"></span>
                                        </button>
                                    </form> 
                                


                                </td>
                                <td>
                                    

                                    <a href="{{ route("responsable.show")}}" class="btn btn-danger btn-sm">
                                        <span class="fas fa-user-times"></span></a>


                                        
                                    <form action="">
                                        <button class="btn btn-danger btn-sm">
                                               <span class="fas fa-user-times"></span>
                                        </button>
                                    </form> 


                                </td>
                            </tr>

                    @endforeach

                        </tbody>
                  </table>
            </div>
        </p>


        <hr>


        <nav aria-label="...">
            <ul class="pagination">
              <li class="page-item disabled">
                <span class="page-link">Anteior</span>
              </li>
              <li class="page-item"><a class="page-link" href="{{ route("responsable.index")}}">1</a></li>
              <li class="page-item active" aria-current="page">
                <span class="page-link">2</span>
              </li>
              <li class="page-item"><a class="page-link" href="{{ route("responsable.index")}}">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Siguiente</a>
              </li>
            </ul>
          </nav>

    </div>
  </div>

@endsection