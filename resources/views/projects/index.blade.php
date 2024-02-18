@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Proyectos de investigacion</h1>
    </div>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Crear proyecto de investigacion</h6>
                    </div>

                    <div class="card-body">
                
                    <form>
  					<div class="form-group">
					    <label for="exampleFormControlInput1">Titulo del proyecto</label>
					    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Titulo">
					  </div>

					 <div class="form-group">
					    <label for="exampleFormControlInput1">Investigador asociado</label>
					    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre completo">
					 </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Area de investigacion</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>Area 1</option>
					      <option>Area 2</option>
					      <option>Area 3</option>
					      <option>Area 4</option>
					      <option>Area 5</option>
					    </select>
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
