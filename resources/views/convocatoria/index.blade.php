@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Convocatoria del Proyecto de investigación</h1>
    </div>


    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('login') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('actividades.show') }}">Ver convocatorias</a></li>
        <li class="breadcrumb-item active" aria-current="page">Crear convocatoria</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Detalles:</h6>
                    </div>

                    <div class="card-body">
                
                    <form>


                <div class="form-group">
                        <label for="exampleFormControlInput1">Codigo de la convocatoria</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                      </div>



                    <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de inicio</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" >
                    </div>

                  <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de finalización</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" >
                    </div>

                  <div class="form-group">
                        <label for="exampleFormControlInput1">Presupuesto aprobado</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" >
                    </div>






                      <button type="submit" class="btn btn-danger">Submit</button>

                    </form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
