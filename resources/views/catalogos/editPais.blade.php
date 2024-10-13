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
        <li class="breadcrumb-item"><a href="{{ route('pais.show') }}">Países</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar país</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Editar país</h6>
                    </div>

                    <div class="card-body">
                
                    <form method="POST" action="{{ route('pais.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf
               
                <div class="form-group">
                        <input type="hidden" value="{{$pais->idpais}}" name="idpais" >
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre</label>
                        <input type="text" class="form-control" name="nombrepais" placeholder="Nombre del país" value="{{$pais->nombrepais}}">
                      </div>

                       <div class="form-group">
                        <label for="exampleFormControlInput1">ISO</label>
                        <input type="text" class="form-control" name="iso" value="{{$pais->iso}}" maxlength="2" 
                         onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))"
                        required>
                      </div>


                      <div class="form-group">
                        <label for="exampleFormControlInput1">Costo diario (USD)</label>
                        <input type="number" class="form-control" name="costo" value="{{$pais->costo}}" 
                        step="0.5" min="0"      
                         onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required
                        >
                      </div>



                      <button type="submit" class="btn btn-danger">Guardar</button>
                      <a  class="btn btn-secondary float-right" href="{{ route('pais.show') }}">Regresar</a>


                    </form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
