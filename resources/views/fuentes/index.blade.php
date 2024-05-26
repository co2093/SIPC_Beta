@extends('layouts.default')
@section('content')

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba')}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show')}}">Presupuesto</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('fuentes.show') }}">Financiamientos</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Registrar fuente de financiamiento</li>
	  </ol>
	</nav>

     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Registrar fuente</h6>
                    </div>

                    <div class="card-body">
                
                    <form>


					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Facultad</label>
					    <select class="form-control" name="facultad" required>
					      <option>Medicina</option>
					      <option>Ingenieria y Arquitectura</option>
					    </select>
					  </div>

				  	<div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo</label>
					    <select class="form-control" name="tipo" required>
					      <option>Cooperacion externa</option>
					      <option>Fuentes nacionales externas a la UES</option>
					    </select>
					</div>


  					<div class="form-group">
					    <label for="exampleFormControlInput1">Nombre de la institución</label>
					    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
					  </div>

				  	<div class="form-group">
					    <label for="exampleFormControlSelect1">Rubro</label>
					    <select class="form-control" name="rubro" required>
					      <option>Recursos</option>
					      <option>Contrataciones</option>
					      <option>Viaticos nacionales</option>
					      <option>Viaticos internacionales</option>
					      <option>Publicaciones</option>
					      <option>Otro</option>
					    </select>
					  </div>


					 <div class="form-group">
					    <label for="exampleFormControlInput1">Monto</label>
					    <input type="number" class="form-control" name="monto" placeholder="0" required>
					 </div>

					  <button type="submit" class="btn btn-danger">Guardar</button>
					   <a  class="btn btn-secondary float-right" href="{{route('fuentes.show')}}">Regresar</a>


					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
