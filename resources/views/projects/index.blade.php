@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Proyectos de investigación</h1>
    </div>


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('projects.show') }}">Proyectos</a></li>
	   	<li class="breadcrumb-item"><a href="{{ route('projects.prueba') }}">Registro</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Titulo</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Crear proyecto de investigación</h6>
                    </div>

                    <div class="card-body">
                
                    <form>
  					<div class="form-group">
					    <label for="exampleFormControlInput1">Título del proyecto</label>
					    <input type="text" class="form-control" id="titulo" placeholder="Título" required>
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Área de conocimiento</label>
					    <select class="form-control" id="area" required>
					      <option>Área 1</option>
					      <option>Área 2</option>
					      <option>Área 3</option>
					      <option>Área 4</option>
					      <option>Área 5</option>
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo de proyecto</label>
					    <select class="form-control" id="tipo" required>
					      <option>Consultoria</option>
					      <option>Investigación básica</option>
					      <option>Otro</option>
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlInput1">Tiempo dedicado a la investigación</label>
					    <input type="number" class="form-control" id="tiempo" placeholder="0" required>
					  </div>


					  <button type="submit" class="btn btn-danger">Submit</button>
				      <a  class="btn btn-secondary float-right" href="{{route('projects.prueba')}}">Regresar</a>



					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
