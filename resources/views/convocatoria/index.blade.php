@extends('layouts.default')
@section('content')

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('login') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('convocatoria.show') }}">Convocatorias</a></li>
        <li class="breadcrumb-item active" aria-current="page">Crear convocatoria</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Definición:</h6>
                    </div>

                    <div class="card-body">
                
            <form method="POST" action="{{ route('convocatoria.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf

                <div class="form-group">
                        <label for="exampleFormControlInput1">Código de la convocatoria</label>
                        <input type="number" class="form-control" name="codigo" placeholder="" required>
                      </div>



                    <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de inicio</label>
                        <input type="date" class="form-control" name="fechainicio" required>
                    </div>

                  <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de finalización</label>
                        <input type="date" class="form-control" name="fechafin" required>
                    </div>

                  <div class="form-group">
                        <label for="exampleFormControlInput1">Presupuesto aprobado</label>
                        <input type="number" class="form-control" name="presupuesto" required>
                    </div>


                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Observación</label>
                        <textarea class="form-control" name="observacion" rows="3"></textarea>
                      </div>




                      <button type="submit" class="btn btn-danger">Crear</button>
                      <a  class="btn btn-secondary float-right" href="{{route('convocatoria.show')}}">Regresar</a>

                    </form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
