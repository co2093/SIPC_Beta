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
                
            <form method="POST" action="{{ route('inventario.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

							@csrf

          <div class="row">
           <div class="col-md-6">	

					 <div class="form-group">
					    <label for="exampleFormControlInput1">Número de serie</label>
					    <input type="number" class="form-control" name="serie" placeholder="" required>
					  </div>
           </div>

            <div class="col-md-6">
						<div class="form-group">
							    <label for="exampleFormControlInput1">Nombre del bien</label>
							    <input type="text" class="form-control" name="nombre" placeholder="" required>
						</div>
					</div>
				</div>



          <div class="row">
           <div class="col-md-6">	

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Facultad</label>
					    <select class="form-control" name="facultad" required>
						    	<option value="" disabled selected>Seleccione una opción</option>

						@foreach($facultades as $i)
							<option value="{{$i->nombrefacultad}}">{{$i->nombrefacultad}}</option>
						@endforeach
					    </select>
					  </div>
				</div>
            <div class="col-md-6">
 						<div class="form-group">
					    <label for="exampleFormControlInput1">Ubicación actual</label>
					    <input type="text" class="form-control" name="ubicacion" placeholder="" required>
					  </div>

            </div>

         </div>

          <div class="row">
           <div class="col-md-4">
  					<div class="form-group">
					    <label for="exampleFormControlInput1">Cantidad</label>
					    <input type="number" class="form-control" name="cantidad" placeholder="" min="1"                   
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
					  </div>
				</div>
					  
            <div class="col-md-4">
					  <div class="form-group">
					    <label for="exampleFormControlInput1">Costo unitario</label>
					    <input type="number" class="form-control" name="costo" placeholder="" min="0" step="0.1" 
					    onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)"

					    required>
					  </div>

				</div>
            <div class="col-md-4">
									<div class="form-group">
					    <label for="exampleFormControlSelect1">Estado</label>
					    <select class="form-control" name="estado" required>
  					    	<option value="" disabled selected>Seleccione una opción</option>

						@foreach($estados as $j)
							<option value="{{$j->idcondicioninventario}}">{{$j->condicion}}</option>
						@endforeach
					    </select>
					  </div>
				</div>
				</div>


					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Especificaciones técnicas del recurso</label>
					    <textarea class="form-control" name="especificaciones" rows="3"></textarea>
					  </div>					 



                         <hr class="my-4">
                        <div class="alert alert-light" role="alert">
                            <strong>Nota:</strong> Todos los montos deben estar expresados en dólares estadounidenses (USD).
                        </div>
                        <hr class="my-4">

					  <div class="form-group">
					  <button type="submit" class="btn btn-danger" id="sub-btn" name="sub-btn">Guardar</button>
					  <a  class="btn btn-secondary float-right" href="{{route('inventario.show')}}">Regresar</a>
					</div>

				</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
