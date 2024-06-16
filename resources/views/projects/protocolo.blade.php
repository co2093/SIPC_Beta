@extends('layouts.default')
@section('content')

<!--
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba')}}">Registro</a></li>
        <li class="breadcrumb-item active" aria-current="page">Protocolo</li>
      </ol>
    </nav>

-->
     <div class="row">
        <div class="col-lg-12">
  	        <div class="card shadow mb-4">

  	        	    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Ver protocolo de investigación

                        </h6>
                    </div>

                    <div class="card-body">
                    
                      <a  class="btn btn-secondary float-right" href="{{route('projects.prueba')}}">Regresar</a>



                    </div>
            </div>
        </div>                    
    </div>





@endsection
