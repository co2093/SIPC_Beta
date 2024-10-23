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
        <li class="breadcrumb-item active" aria-current="page">Enviar</li>
      </ol>
    </nav>
     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                  <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Enviar proyecto de investigación</h6>
                    </div>

                    <div class="card-body">

            <form method="POST" action="{{ route('update.protocolo') }}" accept-charset="UTF-8" enctype="multipart/form-data">

              @csrf   
                      <div class="form-group">
                        <label class="font-weight-bold">Subir protocolo: &nbsp;</label>
                        <input class="form-control" type="file" name="attachment" id="attachment" accept=".doc, .docx" required>
                      </div>

                      <div class="form-group">
                            <input type="hidden" value="{{$cod}}" name="cod" >
                      </div>

                    <hr class="my-4">

                    <button type="button" class="btn btn-danger" id="enviar">Enviar</button>
                    <a  class="btn btn-secondary float-right" href="{{route('projects.prueba', $cod)}}">Regresar</a>

                    <hr class="my-4">

                  <!-- Mensaje de advertencia inicialmente oculto -->
                  <label id="mensajeAdvertencia" class="text-danger" style="display: none;">
                    Una vez enviado el proyecto ya no podrá ser editado y pasará a revisión de la gestora de proyectos.
                    Confirme el envío a continuación.
                  </label>

                  <hr class="my-4">

                  <!-- Botón de confirmar inicialmente oculto -->
                  <button type="submit" class="btn btn-danger" id="confirmar" style="display: none;">Confirmar el envío</button>

            </form>

                    </div>
            </div>
        </div>                    
    </div>


    <script>
    document.getElementById('enviar').addEventListener('click', function() {
        // Mostrar el mensaje de advertencia
        document.getElementById('mensajeAdvertencia').style.display = 'block';
        
        // Mostrar el botón de confirmar
        document.getElementById('confirmar').style.display = 'block';
    });
</script>
@endsection
