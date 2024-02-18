@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Fuentes de financiamiento del Proyecto de investigacion</h1>
    </div>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Registrar fuente de financiamiento</h6>
                    </div>

                    <div class="card-body">
                
                    <form>
  					<div class="form-group">
					    <label for="exampleFormControlInput1">Nombre de la institucion</label>
					    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Titulo">
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo de fuente</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Publica</option>
					      <option>Privada</option>
					    </select>
					  </div>


					 <div class="form-group">
					    <label for="exampleFormControlInput1">Presupuesto disponible</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0">
					 </div>



					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Descripcion</label>
					    <textarea class="form-control" id="Descripcion corta" rows="3"></textarea>
					  </div>

					  <button type="submit" class="btn btn-danger">Submit</button>

					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
