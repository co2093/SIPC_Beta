@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Recursos del Proyecto de investigación</h1>
    </div>


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba')}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show')}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('recursos.show')}}">Recursos</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Crear recurso</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Solicitar recurso</h6>
                    </div>

                    <div class="card-body">
                
                    <form>


				  <div class="form-group">
					    <label for="exampleFormControlSelect1">Actividad asociada</label>
					    <select class="form-control" id="actividad" required>
					      <option>Actividad 1</option>
					      <option>Actividad 2</option>
					      <option>Actividad 3</option>
					    </select>
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
					    <label for="exampleFormControlInput1">Nombre</label>
					    <input type="text" class="form-control" id="nombre" placeholder="Nombre del recurso" required>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Especificaciones tecnicas del recurso</label>
					    <textarea class="form-control" id="especificaciones" rows="3"></textarea>
					  </div>

					
  					<div class="form-group">
					    <label for="exampleFormControlInput1">Costo unitario</label>
					    <input type="number" class="form-control" id="costo" placeholder="0.0">
					  </div>

					 <div class="form-group">
					    <label for="exampleFormControlInput1">Cantidad</label>
					    <input type="number" class="form-control" id="cantidad" placeholder="0.0">
					  </div>


					 <div class="form-group">
					    <label for="exampleFormControlInput1">Subtotal</label>
					    <input type="number" class="form-control" id="subtotal" placeholder="0.0">
					  </div>



					  <button type="submit" class="btn btn-danger">Submit</button>
					  <a  class="btn btn-secondary float-right" href="{{route('recursos.show')}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
