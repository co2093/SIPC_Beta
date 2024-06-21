@extends('layouts.default')
@section('content')




	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>

        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $cod)}}">Registro</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('colaboradores.show', $cod) }}">Colaboradores</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Registrar colaborador</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Registrar colaborador de investigación</h6>
                    </div>

                    <div class="card-body">
                
               <form method="POST" action="{{ route('colaboradores.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf
  					<div class="form-group">
					    <label for="exampleFormControlInput1">Nombre completo</label>
					    <input type="text" class="form-control" name="nombre" placeholder="Nombre completo">
					  </div>


                    <div class="form-group">
                        <input type="hidden" value="{{$cod}}" name="cod" >
                    </div>


					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Ad Honorem</label>
					    <select class="form-control" name="adhonorem">
					      <option value="1">Sí</option>
					      <option value="2">No</option>
	
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Facultad/Unidad</label>
					    <select class="form-control" name="facultad">
						  	@foreach($facultades as $f)
						  		<option value="{{$f->idfacultad}}">{{$f->nombrefacultad}}</option>
						  	@endforeach

					    </select>
					  </div>



					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Sexo</label>
					    <select class="form-control" name="sexo">
					      <option value="1">Masculino</option>
					      <option value="2">Femenino</option>
	
					    </select>
					  </div>
					  

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo</label>
					    <select class="form-control" name="tipo">
					
							@foreach($tipo as $t)
								<option value="{{$t->idtipo}}">{{$t->nombretipocolaborador}}</option>
							@endforeach
	
					    </select>
					  </div>
					  

					  <button type="submit" class="btn btn-danger">Submit</button>
					  <a  class="btn btn-secondary float-right" href="{{route('colaboradores.show', $cod)}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
