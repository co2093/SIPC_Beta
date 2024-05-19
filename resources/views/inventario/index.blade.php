@extends('layouts.default')
@section('content')

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('inventario.show')}}">Inventario</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Crear</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Ingresar recurso</h6>
                    </div>

                    <div class="card-body">
                
                    <form>


				<div class="form-group">
					    <label for="exampleFormControlInput1">Equipo</label>
					    <input type="text" class="form-control" id="nombre" placeholder="" required>
				</div>


				<div class="form-group">
					    <label for="exampleFormControlInput1">Nombre del bien</label>
					    <input type="text" class="form-control" id="nombre" placeholder="" required>
				</div>



					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo de recurso</label>
					    <select class="form-control" id="tipo" required>
					      <option>Materiales</option>
					      <option>Suministros</option>
					      <option>Equipo informatico</option>
					      <option>Equipo de laboratorio</option>
					      <option>Reactivos controlados</option>
					      <option>Reactivos no controlados</option>
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Facultad</label>
					    <select class="form-control" id="tipo" required>
					      <option>Facultad de medicina</option>
					      <option>Facultad de Quimica y Farmacia</option>
					      <option>Facultad de Ingeniera y Arquitectura</option>
					    </select>
					  </div>



  					<div class="form-group">
					    <label for="exampleFormControlInput1">Numero de inventario</label>
					    <input type="number" class="form-control" id="nombre" placeholder="" required>
					  </div>

					 <div class="form-group">
					    <label for="exampleFormControlInput1">Numero de serie</label>
					    <input type="number" class="form-control" id="nombre" placeholder="" required>
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlInput1">Ubicacion actual</label>
					    <input type="number" class="form-control" id="nombre" placeholder="" required>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Especificaciones tecnicas del recurso</label>
					    <textarea class="form-control" id="especificaciones" rows="3"></textarea>
					  </div>



					  <button type="submit" class="btn btn-danger">Submit</button>
					  <a  class="btn btn-secondary float-right" href="{{route('recursos.show')}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
