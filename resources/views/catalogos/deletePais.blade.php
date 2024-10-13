@extends('layouts.default')
@section('content')


    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pais.show') }}">Países</a></li>
        <li class="breadcrumb-item active" aria-current="page">Eliminar país</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Confirme la eliminición del país:</h6>
                    </div>

                    <div class="card-body">
                    	
                    	<br>
                    	<label class="font-weight-bold">Nombre: &nbsp;</label>{{$pais->nombrepais}}                
                
                    	<br>
                    	<label class="font-weight-bold">ISO: &nbsp;</label>{{$pais->iso}}

                        <br>
                        <label class="font-weight-bold">Costo diario (USD): &nbsp;</label>{{$pais->costo}}

                    	<br><br><br>

                  <form action="{{ route('pais.destroy', $pais->idpais) }}" method="POST" style="display:inline">
                    	@csrf
                    	@method('DELETE')
                    	<button class="btn btn-danger btn-md" type="submit">Borrar</button>
                      <a  class="btn btn-secondary float-right" href="{{ route('pais.show') }}">Regresar</a>


                	</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
