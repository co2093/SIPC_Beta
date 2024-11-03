@extends('layouts.default')
@section('content')


    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('mun.show') }}">Municipios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Eliminar municipio</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Confirme la eliminición del municipio:</h6>
                    </div>

                    <div class="card-body">

                            <div class="card mb-3">
                        <div class="card-body">
                    	
                    	<label class="font-weight-bold">Departamento: &nbsp;</label>{{$municipio->departamento}}                
                
                    	<br>
                    	<label class="font-weight-bold">Nombre municipio: &nbsp;</label>{{$municipio->nombremunicipio}}

                        <br>
                        <label class="font-weight-bold">Cantidad de vales de combustible: &nbsp;</label>{{$municipio->valescombustible}}


                    </div></div>

                  <form action="{{ route('mun.destroy', $municipio->idmunicipio) }}" method="POST" style="display:inline">
                    	@csrf
                    	@method('DELETE')
                    	<button class="btn btn-danger btn-md" type="submit">Borrar</button>
                      <a  class="btn btn-secondary float-right" href="{{ route('mun.show') }}">Regresar</a>


                	</form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
