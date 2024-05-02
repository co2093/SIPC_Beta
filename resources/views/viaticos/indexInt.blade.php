@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Viaticos del Proyecto de investigación</h1>
    </div>


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('login') }}">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('viaticos.show') }}">Ver viajes internacionales</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Registrar viaje internacional</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Viajes internacionales</h6>
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
					    <label for="exampleFormControlSelect1">Ciudad</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Des 1</option>
					      <option>Des 2</option>
					      <option>Des 3</option>

					    </select>
					  </div>

					   <div class="form-group">
					    <label for="exampleFormControlSelect1">Pais</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Pais 1</option>
					      <option>Pais 2</option>
					      <option>Pais 3</option>

					    </select>
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlInput1">Costo del boleto aereo</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlInput1">Costo de la inscripcion</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>



					  <div class="form-group">
					    <label for="exampleFormControlInput1">Numero de dias</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0">
					  </div>



					  <div class="form-group">
					    <label for="exampleFormControlInput1">Subtotal</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>







					  <button type="submit" class="btn btn-danger">Submit</button>

					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
