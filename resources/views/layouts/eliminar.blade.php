@extends('layouts.default')
@section('content')

<div class="card">
    <h5 class="card-header"> Eliminar registro </h5>
    <div class="card-body">
        <p class="card-text">
            <div class="alert alert-danger" role="alert">
               <h3>Esta seguro que desea eliminar este registro?</h3> 
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <th>ID</th>
                        <th>Proyecto</th>
                        <th>Infraestructura</th>
                        <th>Area</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$coleccion_locacion->id_locacion}}</td>
                            <td>{{$proyectosArray[0]->nombre_proyecto}}</td>
                            <td>{{$infraestructuras[0]->nombre_t_infra}}</td>
                            <td>{{$coleccion_locacion->area_locacion}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </p>
        <form action="{{route('destroyLocacion',$coleccion_locacion,$coleccion_locacion->id_locacion)}}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{route('homeInfraestructura')}}" class="btn  btn-info">
            <span class="fas fa-undo-alt"></span> Regresar</a>
            <button type="submit" class="btn btn-danger">
            <span class="fas fa-user-times"></span> Eliminar
            </button>
        </form>
    </div>
</div>
@endsection