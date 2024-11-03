@extends('layouts.default')
@section('content')

@if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
@endif

   
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('mun.show') }}">Municipios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar municipio</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Editar </h6>
                    </div>

                    <div class="card-body">
                
                    <form method="POST" action="{{ route('mun.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf
               
                <div class="form-group">
                        <input type="hidden" value="{{$municipio->idmunicipio}}" name="idmunicipio" >
                    </div>

                                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Departamento</label>
                        <select class="form-control" name="departamento" required>
                                <option value="{{$municipio->iddepartamento}}">{{$municipio->departamento}}</option>

                        @foreach($dep as $i)
                        @if($i->iddepartamento!= $municipio->iddepartamento)
                            <option value="{{$i->iddepartamento}}">{{$i->departamento}}</option>
                        @endif
                        @endforeach
                        </select>
                      </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{$municipio->nombremunicipio}}" required>
                      </div>
              <div class="form-group">
                <label for="personas">Cantidad de vales de combustible</label>
                <input type="number" class="form-control" name="vales" id="vales"  min="1" step="1" value="{{$municipio->valescombustible}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
              </div>




                      <button type="submit" class="btn btn-danger">Guardar</button>
                      <a  class="btn btn-secondary float-right" href="{{ route('mun.show') }}">Regresar</a>


                    </form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
