@extends('layouts.default')
@section('content')

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $fuente->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $fuente->idproyecto)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{ route('fuentes.show', $fuente->idproyecto) }}">Financiamientos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Eliminar</li>
      </ol>
    </nav>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Confirme la eliminación de la fuente de financiamiento</h6>
                </div>

                <div class="card-body">
                    <!-- Información en una tarjeta de Bootstrap -->
                    <div class="card mb-3">
                        <div class="card-body">

                            <p><strong>Nombre de la fuente:</strong> {{$fuente->descripcionfuente}}</p>
                            <p><strong>Tipo de institución:</strong> 
                            @if($fuente->esexterno == "true")
                            Cooperacion externa internacional
                            @else
                            Fuentes nacionales externas a la UES
                            @endif           

                            </p>
                            <p><strong>Rubro:</strong> {{$fuente->rubro}}</p>
                            <p><strong>Monto financiado (USD):</strong> <span class="monto">{{$fuente->financiamiento}}</span></p>
                        </div>
                    </div>

                    <div class="alert alert-danger" role="alert">
                        <strong>Nota: </strong>Solo se puede eliminar una fuente que no se haya utilizado en el presupuesto.
                    </div>

                    <hr class="my-4">

                    <!-- Formulario de eliminación con confirmación -->
                    <form action="{{ route('fuentes.destroy', $fuente->idfuente) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-md" type="submit">Borrar</button>
                    </form>

                    <!-- Botón de cancelar -->
                    <a class="btn btn-secondary float-right" href="{{ route('fuentes.show', $fuente->idproyecto) }}">Cancelar</a>
                </div>
            </div>
        </div>
    </div>

@endsection
