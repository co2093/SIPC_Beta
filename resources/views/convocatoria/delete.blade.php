@extends('layouts.default')
@section('content')

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('login') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('convocatoria.show') }}">Convocatorias</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editarr convocatoria</li>
      </ol>
    </nav>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Confirme la eliminación de convocatoria</h6>
                </div>

                <div class="card-body">
                    <!-- Información en una tarjeta de Bootstrap -->
                    <div class="card mb-3">
                        <div class="card-body">

                            <p><strong>Código:</strong> {{$convocatoria->idconvocatoria}}</p>
                            <p><strong>Fecha de inicio:</strong> {{$convocatoria->fechainicio}}</p>
                            <p><strong>Fecha de finalización:</strong> {{$convocatoria->fechafin}}</p>
                            <p><strong>Estado:</strong> {{$convocatoria->estadodescr}}</p>
                            <p><strong>Presupuesto aprobado (USD):</strong> <span class="monto">{{$convocatoria->presupuesto}}</span></p>
                        </div>
                    </div>

                    <div class="alert alert-danger" role="alert">
                        <strong>Nota: </strong>Solo se puede eliminar una convocatoria que no se haya utilizado en los proyectos.
                    </div>

                    <hr class="my-4">

                    <!-- Formulario de eliminación con confirmación -->
                    <form action="{{ route('convocatoria.destroy', $convocatoria->idconvocatoria) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-md" type="submit">Borrar</button>
                    </form>

                    <!-- Botón de cancelar -->
                    <a class="btn btn-secondary float-right" href="{{ route('convocatoria.show') }}">Cancelar</a>
                </div>
            </div>
        </div>
    </div>

@endsection
