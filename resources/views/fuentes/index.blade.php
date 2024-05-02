@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Otros financiamientos del Proyecto de investigación</h1>
    </div>


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('login') }}">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('fuentes.show') }}">Ver financiamientos</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Registrar financiamientos</li>
	  </ol>
	</nav>

     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Registrar financiamientos</h6>
                    </div>

                    <div class="card-body">
                
                    <form>


					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Contraparte</label>
					    <select class="form-control" id="contraparte" required>
					      <option>Publica</option>
					      <option>Privada</option>
					    </select>
					  </div>

  					<div class="form-group">
					    <label for="exampleFormControlInput1">Nombre de la institución</label>
					    <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
					  </div>


					 <div class="form-group">
					    <label for="exampleFormControlInput1">Monto</label>
					    <input type="number" class="form-control" id="monto" placeholder="0" required>
					 </div>

					  <button type="submit" class="btn btn-danger">Submit</button>

					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
