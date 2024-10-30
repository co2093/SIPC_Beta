@extends('layouts.default')
@section('content')


@if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
@endif

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('login') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('convocatoria.show') }}">Convocatorias</a></li>
        <li class="breadcrumb-item active" aria-current="page">Notificación</li>
      </ol>
    </nav>
     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Notificar a usuarios:</h6>
                    </div>
     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                    <div class="card-body">
<form action="{{ route('convocatoria.notificacion') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Convocatoria</label>
                        <select class="form-control" name="idconvocatoria" required>
                        <option value="" disabled selected>Seleccione una opción</option>
                         @foreach($convocatorias as $co)
                            <option value="{{$co->idconvocatoria}}">{{$co->numeroconvocatoria}}</option>
                         @endforeach    
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Comentarios</label>
                        <textarea class="form-control" name="comentarios" rows="6" required></textarea>
                    </div>

                      <div class="form-group">
                        <label class="font-weight-bold">Archivo adjunto: &nbsp;</label>
                        <input class="form-control" type="file" name="attachment" id="attachment" accept=".pdf" required>
                      </div>

                         <hr class="my-4">
                        <div class="alert alert-info" role="alert">
                            <strong>Nota:</strong> Se enviará un correo electrónico a todos los usuarios registrados con los datos especificados en la notificación.
                        </div>
                        <hr class="my-4">
                           
                        <button type="submit" class="btn btn-danger">Enviar</button>
                        <a  class="btn btn-secondary float-right" href="{{route('convocatoria.show')}}">Regresar</a>
                  </form>
                   </div>
            </div>
        </div>                    
    </div>

@endsection