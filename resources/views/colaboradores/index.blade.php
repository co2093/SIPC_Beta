@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Colaboradores del Proyecto de investigación</h1>
    </div>


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('login') }}">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('colaboradores.show') }}">Ver colaboradores</a></li>
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
                
                    <form>
  					<div class="form-group">
					    <label for="exampleFormControlInput1">Nombre completo</label>
					    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre completo">
					  </div>



					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Ad Honorem</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Si</option>
					      <option>No</option>
	
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Facultad/Unidad</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Facultad 1</option>
					      <option>Facultad 2</option>
					      <option>Facultad 3</option>
					    </select>
					  </div>



					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Sexo</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Masculino</option>
					      <option>Femenino</option>
	
					    </select>
					  </div>
					  

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Estudiante</option>
					      <option>Egresado</option>
	
					    </select>
					  </div>
					  

					  <button type="submit" class="btn btn-danger">Submit</button>

					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
