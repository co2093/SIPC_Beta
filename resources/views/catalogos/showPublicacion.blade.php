@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Catálogos</h1>
    </div>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ver tipo de publicación</li>
      </ol>
    </nav>

     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Ver tipo de publicación</h6>
                    </div>

                    <div class="card-body">

                        <a  class="btn btn-success float-right" href="{{route('tipopublicaciones.crear')}}">Agregar</a>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
