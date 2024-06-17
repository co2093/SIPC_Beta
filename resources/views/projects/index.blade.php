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
	    <li class="breadcrumb-item"><a href="{{ route('projects.show') }}">Proyectos</a></li>
	   	<li class="breadcrumb-item"><a href="{{ route('projects.prueba', $cod) }}">Registro</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Título</li>
	  </ol>
	</nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Editar proyecto de investigación</h6>
                    </div>

                    <div class="card-body">
                
            <form method="POST" action="{{ route('projects.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

							@csrf


  		
  						<div class="form-group">
							   
							    <input type="hidden" value="{{$proyectos->idproyecto}}" name="idproyecto" >
						</div>

                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Título del proyecto</label>
                        <textarea class="form-control" name="titulo" rows="3">{{$proyectos->tituloproyecto}}</textarea>
                      </div>


					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Área de conocimiento</label>
					    <select class="form-control" name="area" required>
							<option value="{{$ar->idareaconocimiento}}">{{$ar->nombreareaconocimiento}}</option>

					     @foreach($areas as $a)
					     	@if($a->idareaconocimiento != $proyectos->idareaconocimiento)
					     	<option value="{{$a->idareaconocimiento}}">{{$a->nombreareaconocimiento}}</option>
					     	@endif
					   	 @endforeach	

					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Tipo de proyecto</label>
					    <select class="form-control" name="tipo" required>
					    @if($tp)	
					     	<option value="{{$tp->idtipoproyecto}}">{{$tp->tipoproyecto}}</option>
					    @endif 	
					     @foreach($tipo as $t)
					     	@if($t->idtipoproyecto != $proyectos->idtipoproyecto)
					     	<option value="{{$t->idtipoproyecto}}">{{$t->tipoproyecto}}</option>
					     	@endif
					   	 @endforeach

					    </select>
					  </div>


  					<div class="form-group">
					    <label for="exampleFormControlInput1">Horas dedicadas a la investigación</label>
					    <input type="number" class="form-control"  name="tiempo" value="{{$proyectos->tiempo}}" placeholder="" min="1"                   
					    onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
					  </div>

					  <button type="submit" class="btn btn-danger">Finalizar</button>
				      <a  class="btn btn-secondary float-right" href="{{route('projects.prueba', $cod)}}">Cancelar</a>



					</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
