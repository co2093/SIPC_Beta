@extends('layouts.default')
@section('content')
@section('content')
@if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
@endif



	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{route('archivados.show')}}">Archivados</a></li>
	   	
	    <li class="breadcrumb-item active" aria-current="page">Iniciar nuevo proyecto archivado</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Registrar proyecto de investigación</h6>
                    </div>

                    <div class="card-body">
                
            <form method="POST" action="{{route('archivados.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">

							@csrf

					<div class="form-group">
					    <label for="exampleFormControlSelect1">Convocatoria</label>
					    <select class="form-control" name="idconvocatoria" required>
					     @foreach($convocatorias as $co)
					     	<option value="{{$co->idconvocatoria}}">{{$co->numeroconvocatoria}}</option>
					   	 @endforeach	
					    </select>
					  </div>		

                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Título del proyecto</label>
                        <textarea class="form-control" name="titulo" rows="3"></textarea>
                      </div>


					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Área de conocimiento</label>
					    <select class="form-control" name="area" required>
					     @foreach($areas as $a)
					     	<option value="{{$a->idareaconocimiento}}">{{$a->nombreareaconocimiento}}</option>
					   	 @endforeach	
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo de proyecto</label>
					    <select class="form-control" name="tipo" required>
			    		 @foreach($tipo as $t)
					     	<option value="{{$t->idtipoproyecto}}">{{$t->tipoproyecto}}</option>
					   	 @endforeach		

					    </select>
					  </div>


  					<div class="form-group">
					    <label for="exampleFormControlInput1">Tiempo dedicado a la investigación</label>
					    <input type="number" class="form-control"  name="tiempo" placeholder="" min="1"                   
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
					  </div>


					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Estado</label>
					    <select class="form-control" name="idestado" required>
					     @foreach($estados as $e)
					     	<option value="{{$e->idestadoproyecto}}">{{$e->nombreestadoproyecto}}</option>
					   	 @endforeach	
					    </select>
					  </div>

					  <button type="submit" class="btn btn-danger">Finalizar</button>
				      <a  class="btn btn-secondary float-right" href="{{route('archivados.show')}}">Cancelar</a>



					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
