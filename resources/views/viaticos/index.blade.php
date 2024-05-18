@extends('layouts.default')
@section('content')

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba')}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show')}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('viaticos.show')}}">Viaticos Nacionales</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Registrar viatico</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Viajes locales</h6>
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
					    <label for="exampleFormControlSelect1">Departamento</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Dep 1</option>
					      <option>Dep 2</option>
					      <option>Dep 3</option>

					    </select>
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlInput1">KM a recorrer (ida+regreso)</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlInput1">Cantidad de vales de combustible</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0">
					  </div>


				 <div class="form-group">
					    <label for="exampleFormControlInput1">Hora de salida</label>
					    <input type="time" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>




				 <div class="form-group">
					    <label for="exampleFormControlInput1">Hora de regreso</label>
					    <input type="time" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>



					  <div class="form-group">
					    <label for="exampleFormControlInput1">Cantidad de personas</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>



					  <div class="form-group">
					    <label for="exampleFormControlInput1">Total por persona</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>




					  <div class="form-group">
					    <label for="exampleFormControlInput1">Subtotal</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>

					  <button type="submit" class="btn btn-danger">Submit</button>
					   <a  class="btn btn-secondary float-right" href="{{route('viaticos.show')}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
