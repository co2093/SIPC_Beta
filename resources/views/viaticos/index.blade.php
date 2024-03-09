@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Viaticos del Proyecto de investigación</h1>
    </div>


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('login') }}">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('viaticos.show') }}">Ver viajes locales</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Registrar viajes locales</li>
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
					    <label for="exampleFormControlSelect1">Departamento</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Dep 1</option>
					      <option>Dep 2</option>
					      <option>Dep 3</option>

					    </select>
					  </div>



					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Fuente de financiamiento</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Fuente 1</option>
					      <option>Fuente 2</option>
					      <option>Fuente 3</option>
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlInput1">KM a recorrer</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
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
					    <label for="exampleFormControlInput1">Cantidad de vales de combustible</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlInput1">Jornadas laborales necesarias para el desaroollo</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>


					  	<div class="form-group">
					    <label for="exampleFormControlSelect1">Actividad asociada</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Actividad 1</option>
					      <option>Actividad 2</option>
					      <option>Actividad 3</option>
					    </select>
					  </div>





                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Objetivo asociado</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>Objetivo 1</option>
                          <option>Objetivo 2</option>
                          <option>Objetivo 3</option>
                          <option>Objetivo 4</option>
                          <option>Objetivo 5</option>
                        </select>
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
					    <label for="exampleFormControlInput1">Total plan de viaje</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>

					  <button type="submit" class="btn btn-danger">Submit</button>

					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
