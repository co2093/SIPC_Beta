@extends('layouts.default')
@section('content')

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.show')}}">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects.prueba', $publicacion->idproyecto)}}">Registro</a></li>
        <li class="breadcrumb-item"><a href="{{route('presupuesto.menu.show', $publicacion->idproyecto)}}">Presupuesto</a></li>
        <li class="breadcrumb-item"><a href="{{route('publicaciones.show', $publicacion->idproyecto)}}">Publicaciones</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar publicación</li>
      </ol>
    </nav>


     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Editar publicación</h6>
                    </div>

                    <div class="card-body">
                
        <form method="POST" action="{{ route('publicaciones.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

                            @csrf


                    <div class="form-group">
                        <input type="hidden" value="{{$publicacion->idproyecto}}" name="cod" >
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="{{$publicacion->idpublicacion}}" name="idpublicacion" >
                    </div>

                 <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de publicación</label>
                        <select class="form-control" name="idtipo" required>
                        
                        @foreach($tipos as $t)
                        <option value="{{$t->idtipopublicacion}}">{{$t->nombretipopublicacion}}</option>
                        @endforeach

                        </select>
                  </div>



                 <div class="form-group">
                        <label for="exampleFormControlSelect1">Fuente de financiamiento</label>
                        <select class="form-control" name="idfuente" required>
                        
                        @foreach($fuentes as $f)
                        <option value="{{$f->idfuente}}">{{$f->descripcionfuente}}</option>
                        @endforeach

                        </select>
                  </div>





                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Detalle publicación</label>
                        <textarea class="form-control" name="detalle" rows="3" required>{{$publicacion->detallepublicacion}}</textarea>
                      </div>


                     <div class="form-group">
                        <label for="exampleFormControlInput1">Costo </label>
                        <input type="number" class="form-control" name="costo" placeholder="0.0"
                        step="0.01" min="0"      value="{{$publicacion->montopublicacion}}" 
                         onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required
                        >
                      </div>




                      <button type="submit" class="btn btn-danger">Guardar</button>
                       <a  class="btn btn-secondary float-right" href="{{route('publicaciones.show', $publicacion->idproyecto)}}">Regresar</a>


                    </form>

                    </div>
            </div>
        </div>                    
    </div>





@endsection
