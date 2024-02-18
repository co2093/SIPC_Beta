@extends('layouts.default')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Actividades del Proyecto de investigacion</h1>
    </div>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Definir actividades del proyecto de investigacion</h6>
                    </div>

                    <div class="card-body">
                
                    <form>


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de actividad</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>Tipo 1</option>
                          <option>Tipo 2</option>
                          <option>Tipo 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Actividad</label>
                        <textarea class="form-control" id="Descripcion corta" rows="3"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Objetivo asociado</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>Objetivo 1</option>
                          <option>Objetivo 2</option>
                          <option>Objetivo 3</option>
                          <option>Objetivo 4</option>
                          <option>Objetivo 5</option>
                        </select>
                      </div>



                    <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de inicio</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" >
                    </div>

                  <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de finalizacion</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" >
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Resultados esperados</label>
                        <textarea class="form-control" id="Descripcion corta" rows="3"></textarea>
                    </div>




                      <button type="submit" class="btn btn-danger">Submit</button>

                    </form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
