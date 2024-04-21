@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Publicaciones del Proyecto de investigación</h1>
    </div>


    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('login') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('actividades.show') }}">Ver publicaciones</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registrar publicacion</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Registrar publicacion</h6>
                    </div>

                    <div class="card-body">
                
                    <form>


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de publicacion</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>Articulo cientifico</option>
                          <option>Libro</option>
                          <option>Informe tecnico</option>
                          <option>Manual</option>
                        </select>
                    </div>


                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Detalle</label>
                        <textarea class="form-control" id="Descripcion corta" rows="3"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Fuente de financiamiento</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>Fuente 1</option>
                          <option>Fuente 2</option>
                          <option>Fuente 3</option>
                        </select>
                      </div>

                     <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0">
                      </div>



                     <div class="form-group">
                        <label for="exampleFormControlInput1">Costo unitario</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
                      </div>



                     <div class="form-group">
                        <label for="exampleFormControlInput1">Subtotal</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0.0">
                      </div>



                      <button type="submit" class="btn btn-danger">Submit</button>

                    </form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection