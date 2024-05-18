@extends('layouts.default')
@section('content')



	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba')}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show')}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('personal.show')}}">Contratacion</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Registrar personal</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Registrar contratacion de personal de investigación</h6>
                    </div>

                    <div class="card-body">
                
                    <form>

					
					<div class="form-group">
					    <label for="exampleFormControlSelect1">Actividad asociada</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Actividad 1</option>
					      <option>Actividad 2</option>
					      <option>Actividad 3</option>
					    </select>
					</div>


  		



					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo de personal</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Estudiante</option>
					      <option>Graduado</option>
					      <option>Tipo 3</option>
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlInput1">Pago por hora</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlInput1">Dias laborales</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>


					 <div class="form-group">
					    <label for="exampleFormControlInput1">Subtotal</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>

					  <button type="submit" class="btn btn-danger">Submit</button>
					  <a  class="btn btn-secondary float-right" href="{{route('personal.show')}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
