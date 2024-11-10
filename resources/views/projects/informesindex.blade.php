@extends('layouts.default')
@section('content')

@if (session('success'))
    <div style="color: green; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('archivados.show') }}">Proyectos antiguos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('archivados.informes', $cod) }}">Informes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registar informe</li>

    </ol>
</nav>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark">Agregar nueva documentación de proyectos de investigación archivados</h6>
                <!-- Botón "Agregar" alineado al lado derecho de la cabecera -->
            </div>
           
                    <div class="card-body">

 

            <form method="POST" action="{{ route('archivados.storedoc') }}" accept-charset="UTF-8" enctype="multipart/form-data">

              @csrf   


                <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre del documento</label>
                        <input type="text" class="form-control" name="nombre" placeholder="" required>
                      </div>


                      <div class="form-group">
                        <label class="font-weight-bold">Subir informe: &nbsp;</label>
                        <input class="form-control" type="file" name="attachment" id="attachment" accept=".doc, .docx, .pdf" required>
                      </div>

                      <div class="form-group">
                            <input type="hidden" value="{{$cod}}" name="cod" >
                      </div>

                    <hr class="my-4">

                  <button type="submit" class="btn btn-danger" id="confirmar">Guardar</button>
                    <a  class="btn btn-secondary float-right" href="{{route('archivados.informes', $cod)}}">Regresar</a>


            </form>




                        
                    </div>
        </div>
    </div>
</div>


@endsection
