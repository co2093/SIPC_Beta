@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Recursos del Proyecto de investigación</h1>
    </div>


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('login') }}">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('recursos.show') }}">Ver recursos</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Registrar recurso</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Crear recursos de investigación</h6>
                    </div>

                    <div class="card-body">
                
                    <form>
  					<div class="form-group">
					    <label for="exampleFormControlInput1">Nombre</label>
					    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre del recurso">
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo de recurso</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Tipo 1</option>
					      <option>Tipo 2</option>
					      <option>Tipo 3</option>
					    </select>
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Unidad de medida</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Unidad 1</option>
					      <option>Unidad 2</option>
					      <option>Unidad 3</option>
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
					    <label for="exampleFormControlTextarea1">Especificaciones</label>
					    <textarea class="form-control" id="Descripcion corta" rows="3"></textarea>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo de reactivo</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Controlado</option>
					      <option>No controlado</option>
	
					    </select>
					  </div>



  					<div class="form-group">
					    <label for="exampleFormControlInput1">Precio</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>

					 <div class="form-group">
					    <label for="exampleFormControlInput1">Cantidad</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
					  </div>


					 <div class="form-group">
					    <label for="exampleFormControlInput1">Subtotal</label>
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


					  <button type="submit" class="btn btn-danger">Submit</button>

					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
