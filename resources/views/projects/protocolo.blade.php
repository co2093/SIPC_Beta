@extends('layouts.default')
@section('content')

@if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
@endif
@if (session('error'))
        <div style="color: red; margin-bottom: 20px;">
            {{ session('error') }}
        </div>
@endif


    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $cod)}}">Registro</a></li>
        <li class="breadcrumb-item active" aria-current="page">Protocolo</li>
      </ol>
    </nav>



     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Protocolo de investigación

                        </h6>
                    </div>

                    <div class="card-body">

                    <div class="form-group">
                        <label class="font-weight-bold">Descargar protocolo: &nbsp;</label>
                        <a  class="btn btn-primary btn-sm" href="{{route('protocolo.export')}}"><i class="fas fa-download"></i></a>                                        
                      </div>

                    <br><br>

                       <a  class="btn btn-danger" href="{{route('projects.end', $cod)}}">Finalizar</a>
                 
                      <a  class="btn btn-secondary float-right" href="{{route('projects.prueba', $cod)}}">Regresar</a>



                    </div>
            </div>
        </div>                    
    </div>





@endsection
