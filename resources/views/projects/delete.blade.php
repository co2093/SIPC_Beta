@extends('layouts.default')
@section('content')
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
        @if($proyectos->idestadoproyecto == 1)
            <li class="breadcrumb-item"><a href="{{ route('projects.show') }}">Proyectos</a></li>
        @else
            <li class="breadcrumb-item"><a href="{{ route('archivados.show') }}">Proyectos antiguos</a></li>
        @endif
        <li class="breadcrumb-item"><a href="{{ route('projects.prueba', $cod) }}">Registro</a></li>
        <li class="breadcrumb-item active" aria-current="page">Eliminar</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Confirme la eliminición del proyecto de investigación</h6>
                    </div>

                    <div class="card-body">
                
      <div class="card mb-3">
                        <div class="card-body">
                            <p><strong>Código:</strong> {{$proyectos->id}}</p>
                            <p><strong>Convocatoria:</strong> {{$proyectos->idconvocatoria}}</p>
                            <p><strong>Título:</strong> {{$proyectos->tituloproyecto}}</p>
                            <p><strong>Área de conocimiento:</strong> {{$proyectos->nombreareaconocimiento}}</p>
                            <p><strong>Tipo:</strong> {{$proyectos->tipoproyecto}}</p>
                            <p><strong>Facultad:</strong> {{$proyectos->nombrefacultad}}</p>
                            <p><strong>Estado:</strong> {{$proyectos->nombreestadoproyecto}}</p>
</div></div>

                        <hr class="my-4">
                  <form action="{{ route('projects.destroy', $cod) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-md" type="submit">Borrar</button>
                      <a  class="btn btn-secondary float-right" href="{{ route('projects.prueba', $cod) }}">Regresar</a>


                    </form>


                    </div>
            </div>
        </div>                    
    </div>





@endsection
